<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@dacosta.com'],
            [
                'name' => 'Admin Demo',
                'password' => '123456', // se hashea solo por el cast
            ]
        );

        User::updateOrCreate(
            ['email' => 'demo@dacosta.com'],
            [
                'name' => 'Usuario Demo',
                'password' => '123456',
            ]
        );
    }
}