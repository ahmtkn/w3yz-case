<?php

namespace App\Repositories\Abstractions;

use Illuminate\Database\Eloquent\Model;

interface PostRepository
{
    public function getAll(array $relationship = []);

    public function find(int $id): ?Model;

    public function create(array $data): Model;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}
