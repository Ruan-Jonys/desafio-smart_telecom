<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Chama o seeder específico para o admin principal
        $this->call(AdminUserSeeder::class);

        // Cria 5 provedores com times
        User::factory(5)->withPersonalTeam()->create([
            'role' => 'provedor',
        ]);

        // Cria 4 admins com times
        User::factory(4)->withPersonalTeam()->create([
            'role' => 'admin',
        ]);

        // Usuário de teste fixo
        User::factory()->withPersonalTeam()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role' => 'provedor',
        ]);
    }
}
