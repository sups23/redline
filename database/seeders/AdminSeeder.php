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
        $user->role = 'admin';
        $user->name = 'admin';
        $user->email = 'admin@admin.com';
        $user->blood_group = 'A+';
        $user->contact = '9811111111';
        $user->age = '30';
        $user->gender = 'male';
        $user->donation_interval = 'irregular';
        $user->last_donation_at = '2022-12-26';
        $user->description = 'Admin user';
        $user->save();
    }
}
