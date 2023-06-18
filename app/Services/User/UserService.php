<?php

namespace App\Services\User;

use App\DTO\User\UserCreateDTO;
use App\DTO\User\UserUpdateDTO;
use App\Models\User;
use App\Repository\User\Contracts\UserRepositoryContract;
use App\Services\User\Contracts\UserServiceContract;
use App\Trait\Log;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceContract
{
    use Log;

    public function __construct(
        protected UserRepositoryContract $userRepository
    ) {
    }

    public function getAll(array $columns = ['*']): ?Collection
    {
        try {
            return $this->userRepository->getAll($columns);
        } catch (\Exception $e) {
            $this->logError('services.UserService.getAll', $e);
            throw $e;
        }
    }

    public function getById(int $id, array $columns = ['*']): ?User
    {
        try {
            return $this->userRepository->getById($id, $columns);;
        } catch (\Exception $e) {
            $this->logError('services.UserService.getById', $e);
            throw $e;
        }
    }

    public function create(array $data): User
    {
        try {
            if (!$data['password']) {
                throw new \Exception('It\'s necessary pass to set a password');
            }
            $data['password'] = Hash::make($data['password']);
            $userDTO = UserCreateDTO::new($data);
            return $this->userRepository->create($userDTO);
        } catch (\Exception $e) {
            $this->logError('services.UserService.create', $e);
            throw $e;
        }
    }

    public function update(int $id, array $data): User
    {
        try {
            $this->checkIfUserExists($id);
            $userUpdateDTO = UserUpdateDTO::new($data);
            return $this->userRepository->update($id, $userUpdateDTO);
        } catch (\Exception $e) {
            $this->logError('services.UserService.update', $e);
            throw $e;
        }
    }

    public function delete(int $id): bool
    {
        try {
            $this->checkIfUserExists($id);
            return $this->userRepository->delete($id);
        } catch (\Exception $e) {
            $this->logError('services.UserService.delete', $e);
            throw $e;
        }
    }

    private function checkIfUserExists(int $id): void
    {
        $user = $this->getById($id);
        if (!$user) {
            throw new \Exception('User not found');
        }
    }
}
