<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class PermissionsAssign extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('name', 'admin')->first();
        $employee = Role::where('name', 'employee')->first();
        $driver = Role::where('name', 'driver')->first();
        $customer = Role::where('name', 'user')->first();

        $admin->givePermissionTo('access admin page');
        $employee->givePermissionTo('access employee page');
        $driver->givePermissionTo('access driver page');
        $customer->givePermissionTo('access customer page');
    }
}
