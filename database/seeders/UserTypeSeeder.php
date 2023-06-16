<?php

namespace Database\Seeders;

use App\Enum\UserType;
use App\Models\UserType as ModelsUserType;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'id' => UserType::ID_SUPER_ADMIN,
                'type' => UserType::LABEL_SUPER_ADMIN
            ],
            [
                'id' => UserType::ID_ADMIN,
                'type' => UserType::LABEL_ADMIN
            ],
            [
                'id' => UserType::ID_MEMBER,
                'type' => UserType::LABEL_MEMBER
            ]
        ];
        array_map(function ($item) {
            ModelsUserType::updateOrCreate(
                ['id' => $item['id']],
                $item
            );
        }, $types);
    }
}
