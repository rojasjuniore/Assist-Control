<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstudioNota extends Model
{
    protected $table = 'estudios_notas';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'estudio_id',
        'remedio_id',
        'nota'
    ];
}
