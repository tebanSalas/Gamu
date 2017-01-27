<?php

namespace gamu;

use Illuminate\Database\Eloquent\Model;

class matricula extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_estudiante', 'id_ciclo', 'id_curProf','recibo_banco','nota',
    ];
}

