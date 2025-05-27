<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::dropIfExists('plans');
    }

    public function down()
    {
        // Você pode recriar a tabela aqui se precisar reverter
        // Mas como queremos recriar corretamente, pode deixar vazio
    }
};