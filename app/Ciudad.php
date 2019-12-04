<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
        protected $table = 'geo_cities';

    protected $primaryKey = 'id';

    public $timestamps = false;

     protected $fillable = [
     	'id',
        'state_id',
        'name'
    ];
}
