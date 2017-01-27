<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cedula', 11);
            $table->string('nombre', 60);
            $table->string('apellidos', 60);
            $table->date('fecha_nacimiento');
            $table->string('telefono', 10);
            $table->string('email', 60);
            $table->string('sede', 60);
            //emergencia
            $table->string('nombre_padre1', 60);
            $table->string('tel_padre1', 60);
            $table->string('nombre_padre2', 60)->nullable();
            $table->string('tel_padre2', 60)->nullable();
            $table->string('email_emergencia', 60);
            //beca
            $table->integer('id_beca')->unsigned();
            $table->foreign('id_beca')->references('id')->on('becas');
            //borrado logico
            $table->boolean('delete');


            
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
        Schema::dropIfExists('estudiantes');
    }
}
