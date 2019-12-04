<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'geo_states';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'name',
    ];
}
