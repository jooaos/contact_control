<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'birth_date',
        'address',
        'city',
        'country',
        'user_type_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function userType()
    {
        return $this->hasOne(UserType::class, 'user_type_id');
    }
}
