<?php

namespace Database\Seeders;

use App\Models\Api\V1\Role\RoleModel;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = [
            [
                'role_key' => '1',
                'role' => 'Pengguna',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_key' => '2',
                'role' => 'Admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        RoleModel::truncate();
        RoleModel::insert($array);
    }
}
