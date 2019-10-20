<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacturacionHistorial extends Model
{
    protected $table = 'facturacion_historial';

    protected $primaryKey = 'id';

    public $timestamps = false;

     protected $fillable = [
        'code_cliente',
        'metodo',
        'monto', 
        'fecha',
        'descripcion',
    ];
}
