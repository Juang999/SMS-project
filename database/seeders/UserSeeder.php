<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'super-admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('secret')
        ]);

        $admin->assignRole('super-admin');

        $staff = User::create([
            'name' => 'staff',
            'email' => 'staff@gmail.com',
            'password' => bcrypt('secret')
        ]);

        $staff->assignRole('staff');
    }
}
