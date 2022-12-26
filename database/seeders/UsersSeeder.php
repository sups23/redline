<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\Models\User;
        $user->name = 'manager1';
        $user->email = 'manager1@redline.com';
        $user->password = bcrypt('password');
        $user->assignRole('Manager');
        $user->save();

        $user = new \App\Models\User;
        $user->name = 'technician1';
        $user->email = 'tech1@redline.com';
        $user->password = bcrypt('password');
        $user->assignRole('Technician');
        $user->save();

        $user = new \App\Models\User;
        $user->name = 'hospital1';
        $user->email = 'hospital1@redline.com';
        $user->password = bcrypt('password');
        $user->assignRole('Hospital');
        $user->save();

        $user = new \App\Models\User;
        $user->name = 'staff1';
        $user->email = 'staff1@redline.com';
        $user->password = bcrypt('password');
        $user->assignRole('Staff');
        $user->save();

    }
}
