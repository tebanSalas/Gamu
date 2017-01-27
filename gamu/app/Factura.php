<?php

namespace gamu;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    //
     //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_estudiante', 'fecha_pago', 'recibo_banco','mes_cobro',
    ];
}


