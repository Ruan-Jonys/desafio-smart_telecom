<?php

namespace App\Models;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;

// Modelo User estende Authenticatable e implementa CanResetPassword
class User extends Authenticatable implements CanResetPassword 
{
    // Traits que adicionam funcionalidades ao modelo
    use HasApiTokens; // Suporte a tokens de API (Laravel Sanctum)
    use HasFactory; // Suporte a factories para testes
    use HasProfilePhoto; // Suporte a foto de perfil (Jetstream)
    use HasTeams; // Suporte a times/equipes (Jetstream)
    use Notifiable; // Suporte a notificações
    use TwoFactorAuthenticatable; // Suporte a autenticação 2FA (Fortify)
    use CanResetPasswordTrait; // Suporte a reset de senha

    /**
     * Atributos que podem ser atribuídos em massa (fillable)
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', // Nome do usuário
        'email', // Email do usuário
        'role', // Papel do usuário (admin, provedor, etc)
        'cnpj', // CNPJ do provedor
        'address', // Endereço
        'neighborhood', // Bairro
        'zipcode', // CEP
        'city', // Cidade
        'state', // Estado
        'password', // Senha
        'profile_photo_path', // Caminho da foto de perfil
    ];

    /**
     * Atributos ocultos para arrays/JSON (hidden)
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password', // Nunca expor a senha
        'remember_token', // Token lembrar sessão
        'two_factor_recovery_codes', // Códigos de recuperação 2FA
        'two_factor_secret', // Segredo do 2FA
    ];

    /**
     * Atributos adicionais para o array (appends)
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url', // URL da foto de perfil (gerado por accessor do Jetstream)
    ];

    /**
     * Cast de tipos automáticos de atributos
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', // Converte para objeto DateTime
            'password' => 'hashed', // Aplica hash automaticamente ao salvar
        ];
    }

    //Relacionamento: Um usuário pode ter vários planos
    public function plans()
    {
        return $this->hasMany(Plan::class);
    }

    // Verifica se o usuário é administrador
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    //Verifica se o usuário é provedor
    public function isProvedor()
    {
        return $this->role === 'provedor';
    }
}