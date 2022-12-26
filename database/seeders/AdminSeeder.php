<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\Models\User;
        
        $user->name = 'admin';
        $user->email = 'admin@redline.com';
        $user->password = bcrypt('password');

        $user->assignRole('Admin');
        $user->save();
    }
}
