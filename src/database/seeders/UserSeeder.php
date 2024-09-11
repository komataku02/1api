<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'id' => 1,
            'name' => 'AdminUser',
            'email' => 'admin@example.com',
            'password' => bcrypt('adminpassword'),
        ]);

        User::create([
            'id' => 2,
            'name' => 'TestUser',
            'email' => 'test@example.com',
            'password' => bcrypt('testpassword'),
        ]);

        User::factory()->count(48)->create();
    }
}
