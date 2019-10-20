<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'ordenes';

    protected $primaryKey = 'id_orden';

    public $timestamps = false;

     protected $fillable = [
     	'fecha',
     	'ware_reciept',
     	'peso',
     	'tracking',
     	'status',
     	'doc',
     	'code_cliente',
        'costo',
        'instrucciones',
        'ultima_milla',
    ];


}
