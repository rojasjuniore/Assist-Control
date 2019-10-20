<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FechaDespacho extends Model
{
    protected $table = 'despacho_fecha';

    protected $primaryKey = 'id_despacho_fecha';

    public $timestamps = false;

     protected $fillable = [
        'tipo',
        'ware_reciept',
        'fecha_despacho',
    ];
}
