<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Backpack\PermissionManager\app\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role;
        $role->name = 'Admin';
        $role->save();

        $role = new Role;
        $role->name = 'Staff';
        $role->save();

        $role = new Role;
        $role->name = 'Customer';
        $role->save();

        $role = new Role;
        $role->name = 'Manager';
        $role->save();

        $role = new Role;
        $role->name = 'Technician';
        $role->save();
    }
}
