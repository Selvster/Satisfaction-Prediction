<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create admin
       \App\Models\User::create([
            'username' => 'Admin',
            'name' => 'Admin',
            'email' => 'admin@platform.com',
            'password' => password_hash('admin', PASSWORD_DEFAULT),
        ]);

    }
}
