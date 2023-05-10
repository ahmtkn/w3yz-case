<?php

namespace App\Repositories\Concretes;

use App\Models\Category;
use App\Models\User;
use App\Repositories\Abstractions\CategoryRepository;
use Illuminate\Database\Eloquent\Model;

class CategoryRepositoryElequent implements CategoryRepository
{
    protected $model;

    public function __construct(Category $model)
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
        return $this->model->find($id)->update($data);
    }

    public function delete(int $id): bool
    {
        return $this->model->find($id)->delete();
    }
}
