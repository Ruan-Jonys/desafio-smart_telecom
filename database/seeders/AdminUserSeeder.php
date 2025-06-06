<?php

namespace Database\Seeders;

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
            'address' => 'Rua Exemplo, 100',
            'neighborhood' => 'Centro',
            'zipcode' => '01000-000',
            'city' => 'São Paulo',
            'state' => 'SP',
            'profile_photo_path' => null,
            'email_verified_at' => now(),
            'remember_token' => \Illuminate\Support\Str::random(10),
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'current_team_id' => null,
        ]);
    }
}