<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',       // Nome do plano
        'descricao',  // Descrição do plano
        'velocidade', // Velocidade do plano (ex: 100 Mbps)
        'preco',      // Preço do plano
        'status',     // Status do plano (ativo/inativo)
        'team_id',    // Referência ao time (equipe/provedor) dono do plano
        'user_id'     // Referência ao usuário criador/dono do plano
    ];


    public function team()
    {
        // Relacionamento com o modelo Team do Jetstream
        return $this->belongsTo(\Laravel\Jetstream\Team::class);
    }


    public function user()
    {
        // Relacionamento com o modelo User
        return $this->belongsTo(User::class);
    }
}