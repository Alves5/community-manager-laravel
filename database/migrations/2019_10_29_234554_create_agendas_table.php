<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('evento');
            $table->string('mentor');
            $table->string('local');
            $table->string('descricao');
            $table->string('equipamento');
            $table->string('color');
            $table->date('start_date');
            $table->date('end_date');
            $table->time('hora_criacao');
            $table->tinyInteger('privado')->default(0);
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
        Schema::dropIfExists('agendas');
    }
}
