<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estante extends Model
{
    protected $table = 'estante';

    protected $primaryKey = 'id_estante';

    public $timestamps = false;

     protected $fillable = [
        'id_estante',
        'codigo', 
        'estatus',
    ];
}
