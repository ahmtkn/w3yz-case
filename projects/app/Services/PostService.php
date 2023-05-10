<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Post;
use App\Repositories\Abstractions\PostRepository;

class PostService
{
    protected  $repository;

    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll(array $relationship = [])
    {
        return $this->repository->getAll($relationship);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        return $this->repository->create($data);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function update(Post $post, array $data)
    {
        return $this->repository->update($post->id, $data);
    }

    public function delete(Post $post)
    {
        return $this->repository->delete($post->id);
    }

}
