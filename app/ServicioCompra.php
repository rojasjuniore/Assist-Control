<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicioCompra extends Model
{
    protected $table = 'servicios_compra';

    protected $primaryKey = 'id';

    public $timestamps = false;

     protected $fillable = [
        'codigo_cliente',
        'precio',
    ];
}
