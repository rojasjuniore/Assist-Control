<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
     protected $table = 'promocion';

    protected $primaryKey = 'id';

    public $timestamps = false;

     protected $fillable = [
        'nombre',
        'descripcion', 
    ];
}
