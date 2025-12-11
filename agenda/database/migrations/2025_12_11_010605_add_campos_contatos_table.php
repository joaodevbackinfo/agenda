<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contatos', function (Blueprint $table) {

            // Adiciona nascimento se não existir
            if (!Schema::hasColumn('contatos', 'nascimento')) {
                $table->date('nascimento')->nullable();
            }

            // Adiciona observacoes se não existir
            if (!Schema::hasColumn('contatos', 'observacoes')) {
                $table->text('observacoes')->nullable();
            }

            // Adiciona endereco se não existir
            if (!Schema::hasColumn('contatos', 'endereco')) {
                $table->string('endereco')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('contatos', function (Blueprint $table) {

            if (Schema::hasColumn('contatos', 'nascimento')) {
                $table->dropColumn('nascimento');
            }

            if (Schema::hasColumn('contatos', 'observacoes')) {
                $table->dropColumn('observacoes');
            }

            if (Schema::hasColumn('contatos', 'endereco')) {
                $table->dropColumn('endereco');
            }
        });
    }
};
