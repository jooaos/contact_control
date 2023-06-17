<?php

namespace App\Repository\User;

use App\DTO\User\UserCreateDTO;
use App\DTO\User\UserUpdateDTO;
use App\Models\User;
use App\Repository\User\Contracts\UserRepositoryContract;
use Illuminate\Database\Eloquent\Collection;

class UserEloquentRepository implements UserRepositoryContract
{

    public function getAll(array $columns = ['*']): ?Collection
    {
        return User::all($columns);
    }

    public function getById(int $id, array $columns = ['*']): ?User
    {
        return User::find($id, $columns);
    }

    public function getWithCustomQuery(array $params): Collection
    {
        return User::where($params)->get();
    }

    public function create(UserCreateDTO $userDTO): User
    {
        return User::create($userDTO->toArray());
    }

    public function update(int $id, UserUpdateDTO $userUpdateDTO): User
    {
        $user = User::findOrFail($id);
        $user->update($userUpdateDTO->toArray());
        return $user;
    }

    public function delete(int $id): bool
    {
        $user = User::findOrFail($id);
        return $user->delete();
    }
}
