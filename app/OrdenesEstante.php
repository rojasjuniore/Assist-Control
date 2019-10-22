<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenesEstante extends Model
{
     protected $table = 'ordenes_estante';

    protected $primaryKey = 'id_ordenes_estante';

    public $timestamps = false;

     protected $fillable = [
        'id_estante',
        'orden', 
        'estatus',
        'fecha',
    ];
}
