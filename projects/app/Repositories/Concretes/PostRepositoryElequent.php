<?php
declare(strict_types=1);

namespace App\Repositories\Concretes;

use App\Models\Post;
use App\Repositories\Abstractions\PostRepository;
use App\Services\UploadService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostRepositoryElequent implements PostRepository
{
    protected $model;

    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    function getAll(array $relationship = [])
    {
        return $this->model->with($relationship)->get();
    }

    public function find(int $id): ?Model
    {
        return $this->model->find($id);
    }

    /**
     * @param array<string,mixed> $data
     *
     * @return Model
     */
    public function create(array $data): Model
    {
        $file = $this->putFile($data);
        $data['heroImage'] = $file;
        return $this->model->create($data);
    }

    /**
     * @param array<string,mixed> $data
     * @param int $id
     *
     * @return bool
     */
    public function update(int $id, array $data): bool
    {
        $file = $this->putFile($data);
        $data['heroImage'] = $file;
        return $this->model->find($id)->update($data);
    }

    public function delete(int $id): bool
    {
        return $this->model->find($id)->delete();
    }



    private function putFile(array $data)
    {
        if ($data['heroImage'] instanceof UploadedFile) {
            return Storage::disk('public')
                ->putFileAs(
                    path:  'images/' . Str::slug($data['title']) . '-' . strtotime((string)now()),
                    file: $data['heroImage'],
                    name: Str::slug($data['title']) . '.' . $data['heroImage']->getClientOriginalExtension(),
                );
        }
    }
}
