<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
    protected $table = 'icon';

    protected $primaryKey = 'id';

    public $timestamps = false;

     protected $fillable = [
        'nombre',
        'url', 
    ];

}
