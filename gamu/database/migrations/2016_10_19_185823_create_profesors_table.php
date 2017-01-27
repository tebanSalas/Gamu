<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cedula', 11);
            $table->string('nombre', 60);
            $table->string('apellidos', 60);
            $table->date('fecha_nacimiento');
            $table->string('telefono', 10);
            $table->string('email', 60);
            $table->string('especialidad', 60);
            $table->integer('sueldo');
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
        Schema::dropIfExists('profesors');
    }
}
