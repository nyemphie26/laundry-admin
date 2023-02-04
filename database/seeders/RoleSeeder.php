<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Role::truncate();

        $roles = [
            [
                'name' => 'admin',
                'guard_name' => 'web'
            ],
            [
                'name' => 'user',
                'guard_name' => 'web'
            ],
            [
                'name' => 'employee',
                'guard_name' => 'web'
            ],
            [
                'name' => 'driver',
                'guard_name' => 'web'
            ]
        ];

        Role::insert($roles);
    }
}
