<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacturaOrder extends Model
{
    protected $table = 'factura_orden';

    protected $primaryKey = 'id_factura_orden';

    public $timestamps = false;

     protected $fillable = [
     	'codigo',
     	'id_cliente',
     	'id_tipo_tarifa',
     	'peso_total',
     	'costo_total',
     	'costo_env_total',
     	'id_usuario_registro',
        'fecha_registro',
        'cupon',
        'promo',
        'facturado',
    ];


}
