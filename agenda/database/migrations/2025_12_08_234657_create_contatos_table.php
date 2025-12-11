<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contatos', function (Blueprint $table) {
            $table->id();

            // RELACIONAMENTO COM USUÁRIO
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->string('nome');
            $table->string('email')->nullable();
            $table->string('telefone')->nullable();
            $table->string('endereco')->nullable();
            $table->date('nascimento')->nullable();
            $table->text('observacoes')->nullable();
            $table->string('avatar')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contatos');
    }
};
