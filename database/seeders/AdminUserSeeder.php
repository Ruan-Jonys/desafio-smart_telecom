<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Cria um usuário com dados de administrador
        User::create([
            'name' => 'Administrador', // Nome do usuário admin
            'email' => 'admin@empresa.com', // Email de acesso
            'password' => bcrypt('senha123'), // Senha criptografada (senha padrão: senha123)
            'role' => 'admin', // Define o papel como administrador
            'cnpj' => '12345678000199', // CNPJ fictício
            'address' => 'Rua Exemplo, 100', // Endereço exemplo
            'neighborhood' => 'Centro', // Bairro exemplo
            'zipcode' => '01000-000', // CEP exemplo
            'city' => 'São Paulo', // Cidade exemplo
            'state' => 'SP', // Estado exemplo
            'profile_photo_path' => null, // Sem foto de perfil
            'email_verified_at' => now(), // Marca o email como verificado
            'remember_token' => \Illuminate\Support\Str::random(10), // Token de "lembrar-me" gerado aleatoriamente
            'two_factor_secret' => null, // Sem 2FA configurado
            'two_factor_recovery_codes' => null, // Sem códigos de recuperação de 2FA
            'current_team_id' => null, // Sem equipe vinculada
        ]);
    }
}