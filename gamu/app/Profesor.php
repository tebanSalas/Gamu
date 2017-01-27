<?php

namespace gamu;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
     //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cedula', 'nombre', 'apellidos', 'fecha_nacimiento','telefono','email','especialidad','sueldo', 'delete',
    ];
}