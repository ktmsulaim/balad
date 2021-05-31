<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'info@balad.co.in',
            'password' => 'admin@balad',
            'phone' => '123456789',
            'is_admin' => 1, 
        ]);
    }
}
