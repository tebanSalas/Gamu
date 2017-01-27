<?php

namespace gamu;

use Illuminate\Database\Eloquent\Model;

class Beca extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'descuento', 'detalle', 'delete',
    ];
} 