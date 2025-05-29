<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'velocidade',
        'preco',
        'status',
        'team_id',
        'user_id'
    ];

    public function team()
    {
        return $this->belongsTo(\Laravel\Jetstream\Team::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
