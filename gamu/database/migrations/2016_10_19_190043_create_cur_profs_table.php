<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurProfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cur_profs', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_curso')->unsigned();
            $table->foreign('id_curso')->references('id')->on('cursos');

            $table->integer('id_prof')->unsigned();
            $table->foreign('id_prof')->references('id')->on('profesors');

            $table->integer('id_ciclo')->unsigned();
            $table->foreign('id_ciclo')->references('id')->on('ciclos');

            $table->string('horario', 750);
            
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
        Schema::dropIfExists('cur_profs');
    }
}
