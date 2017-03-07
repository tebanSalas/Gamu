<?php

namespace gamu;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    //
     //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'sigla', 'tipo','delete'
    ];
}



