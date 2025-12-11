<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('contatos', function (Blueprint $table) {
            $table->string('endereco')->nullable()->after('telefone');
        });
    }

    public function down()
    {
        Schema::table('contatos', function (Blueprint $table) {
            $table->dropColumn('endereco');
        });
    }
};
