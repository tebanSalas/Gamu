<?php

namespace gamu;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cedula', 'nombre', 'apellidos','fecha_nacimiento','telefono','email','nombre_padre1','tel_padre1','id_beca','sede','nombre_padre2','tel_padre2', 'email_emergencia','delete',
    ];
}
