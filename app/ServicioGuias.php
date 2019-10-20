<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicioGuias extends Model
{
    protected $table = 'servicios_guias';

    protected $primaryKey = 'id';

    public $timestamps = false;

     protected $fillable = [
        'id_servicio',
        'id_compra',
        'id_orden',
    ];
}
