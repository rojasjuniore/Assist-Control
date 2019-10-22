<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenDhl extends Model
{
    protected $table = 'orden_despacho_dhl';

    protected $primaryKey = 'id_orden_despacho_dhl';

    public $timestamps = false;

     protected $fillable = [
        'orden',
        'descripcion', 
        'comentario',
        'valor_declarado',
        'id_usuario_sistema',
        'id_direccion_clientePrimaria',
        'code_cliente'
    ];
}
