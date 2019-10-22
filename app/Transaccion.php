<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    protected $table = 'transaccion';

    protected $primaryKey = 'id_transaccion';

    public $timestamps = false;

     protected $fillable = [
        'code_cliente',
        'id_orden', 
        'id_con',
        'monto',
        'fecha',
        'codigo',
        'metodo',
    ];
}
