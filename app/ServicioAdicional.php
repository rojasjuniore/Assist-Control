<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicioAdicional extends Model
{
    protected $table = 'servicio_adicional';

    protected $primaryKey = 'id';

    public $timestamps = false;

     protected $fillable = [
        'nombre',
        'precio',
        'icono',
        'descripcion',
    ];
}
