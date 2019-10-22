<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagodhl extends Model
{
    protected $table = 'pagodhl';

    protected $primaryKey = 'id';

    public $timestamps = false;

     protected $fillable = [
        'code_cliente',
        'id_orden',
        'id_transaccion',
        'usd', 
        'cop',
        'codigo',
        'estatus',
    ];
}
