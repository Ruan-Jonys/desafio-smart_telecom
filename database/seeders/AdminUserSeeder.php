<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@empresa.com',
            'password' => bcrypt('senha123'),
            'role' => 'admin',
            'cnpj' => '12345678000199',
        ]);
    }
}
