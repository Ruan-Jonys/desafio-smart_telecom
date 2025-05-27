<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 255);
            $table->text('descricao')->nullable();
            $table->integer('velocidade'); // em Mbps
            $table->decimal('preco', 10, 2); // 10 dígitos no total, 2 decimais
            $table->foreignId('team_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            
            // Índices para melhor performance
            $table->index('team_id');
            $table->index('user_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('plans');
    }
};