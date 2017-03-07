<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatriculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_estudiante')->unsigned();
            $table->foreign('id_estudiante')->references('id')->on('estudiantes');

            $table->integer('id_ciclo')->unsigned();
            $table->foreign('id_ciclo')->references('id')->on('ciclos');

            $table->integer('id_curProf')->unsigned();
            $table->foreign('id_curProf')->references('id')->on('cur_Profs');

            $table->integer('recibo_banco')->unsigned();
            $table->foreign('recibo_banco')->references('id')->on('facturas');

            $table->integer('nota');
            
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
        Schema::dropIfExists('matriculas');
    }
}
