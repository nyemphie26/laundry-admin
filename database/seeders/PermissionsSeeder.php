<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
            Permission::truncate();
        Schema::enableForeignKeyConstraints();

        $permissions = [
            [
                'name' => 'access admin page',
                'guard_name' => 'web'
            ],
            [
                'name' => 'access employee page',
                'guard_name' => 'web'
            ],
            [
                'name' => 'access driver page',
                'guard_name' => 'web'
            ],
            [
                'name' => 'access customer page',
                'guard_name' => 'web'
            ]
        ];

        Permission::insert($permissions);

    }
}
