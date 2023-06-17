<?php

namespace App\Repository\User\Contracts;

use App\DTO\User\UserCreateDTO;
use App\DTO\User\UserUpdateDTO;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryContract
{
    public function getAll(array $columns = ['*']): ?Collection;

    public function getById(int $id, array $columns = ['*']): ?User;

    public function getWithCustomQuery(array $params): Collection;

    public function create(UserCreateDTO $user): User;

    public function update(int $id, UserUpdateDTO $user): User;

    public function delete(int $id): bool;
}
