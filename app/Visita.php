<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    protected $table = 'visitaguiada';

    protected $primaryKey = 'id';

    public $timestamps = false;

     protected $fillable = [
        'code_cliente',
        'prealerta', 
        'home',
    ];
}
