<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDespacho extends Model
{
    protected $table = 'orden_despacho';

    protected $primaryKey = 'id_orden_despacho';

    public $timestamps = false;

     protected $fillable = [
     	'orden',
     	'descripcion',
     	'tipo_envio',
     	'valor_declarado',
     	'estatus',
     	'fecha_registro',
        'id_direccion_clientePrimaria',
        'code_cliente',
    ];
}

