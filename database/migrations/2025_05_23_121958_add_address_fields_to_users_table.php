<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Endereço
            $table->string('address')->nullable()->after('cnpj');
            // Bairro
            $table->string('neighborhood')->nullable()->after('address');
            // CEP
            $table->string('zipcode', 9)->nullable()->after('neighborhood');
            // Cidade
            $table->string('city')->nullable()->after('zipcode');
            // Estado
            $table->string('state', 2)->nullable()->after('city');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['address', 'neighborhood', 'zipcode', 'city', 'state']);
        });
    }
};
