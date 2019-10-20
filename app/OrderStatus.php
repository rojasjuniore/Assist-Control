<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $table = 'ordenes_estatus';

    protected $primaryKey = 'id_orden_estatus';

    public $timestamps = false;

     protected $fillable = [
        'ware_reciept',
        'estatus',
        'fecha_orden',
        'tipo',   
     ];
}
