<?php

namespace Database\Seeders;

use App\Models\Api\V1\User\UserModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = [
            'name' => 'Admin Pusproject',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
        ];

        UserModel::truncate();
        UserModel::create($array);
    }
}
