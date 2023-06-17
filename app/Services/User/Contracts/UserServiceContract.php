<?php

namespace App\Services\User\Contracts;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserServiceContract
{
    public function getAll(array $columns = ['*']): ?Collection;

    public function getById(int $id, array $columns = ['*']): ?User;

    public function create(array $data): User;

    public function update(int $id, array $data): User;

    public function delete(int $id): bool;
}
