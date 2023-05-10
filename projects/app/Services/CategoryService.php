<?php
declare(strict_types=1);

namespace App\Services;


use App\Models\Category;
use App\Repositories\Abstractions\CategoryRepository;

class CategoryService
{
    protected  $repository;

    public function __construct(CategoryRepository $repository)
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
    public function update(Category $category, array $data)
    {
        return $this->repository->update($category->id, $data);
    }

    public function delete(Category $category)
    {
        return $this->repository->delete($category->id);
    }

}
