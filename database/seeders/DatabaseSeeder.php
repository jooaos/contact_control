<?php

namespace Database\Seeders;

use App\Enum\UserType;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTypeSeeder::class);
        // Super admin
        User::factory()->make([
            'user_type_id' => UserType::ID_SUPER_ADMIN
        ]);
        // Admin
        User::factory()->make([
            'user_type_id' => UserType::ID_ADMIN
        ]);
        // Member
        User::factory()->make([
            'user_type_id' => UserType::ID_MEMBER
        ]);
    }
}
