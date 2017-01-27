<?php

namespace gamu;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    //
     //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_estudiante', 'id_instrumento', 
    ];
}
