<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDadosMentoresMembrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dados_mentores_membros', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('foto')->nullable();
            $table->string('nome');
            $table->string('dataNasc');
            $table->string('especializacao');
            $table->string('telefone');
            $table->string('endereco');
            $table->string('redesSociais');
            $table->string('sobre');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dados_mentores_membros');
    }
}
