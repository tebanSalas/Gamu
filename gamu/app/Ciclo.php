<?php

namespace gamu;

use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
    //
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ciclo', 'year', 'habilitado',
    ];
}
