<?php

namespace gamu;

use Illuminate\Database\Eloquent\Model;

class Instrumento extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'serie', 'marca', 'disponibilidad', 'estado', 'delete','num_activo'
    ];
}




 