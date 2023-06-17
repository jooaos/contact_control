<?php

namespace App\DTO\User;

use App\DTO\BaseDTO;
use Illuminate\Support\Arr;

final class UserCreateDTO extends BaseDTO
{
    public string $name;
    public string $email;
    public string $password;
    public int $user_type_id;


    public static function new(...$args)
    {
        return new self(...$args);
    }

    private function __construct(
        public array $data
    ) {
        $this->name = Arr::get($data, 'name');
        $this->email = Arr::get($data, 'email');
        $this->password = Arr::get($data, 'password');
        $this->user_type_id = Arr::get($data, 'user_type_id');
    }
}
