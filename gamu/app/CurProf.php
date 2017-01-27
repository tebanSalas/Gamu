<?php

namespace gamu;

use Illuminate\Database\Eloquent\Model;

class CurProf extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_curso', 'id_prof', 'horario',
    ];
}
