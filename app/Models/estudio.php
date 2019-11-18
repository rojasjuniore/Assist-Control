<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class estudio
 * @package App\Models
 * @version November 3, 2019, 9:03 am EST
 *
 * @property string estudio
 * @property integer estatus
 * @property string prueba_uno
 */
class estudio extends Model
{
    use SoftDeletes;

    public $table = 'estudios';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'estudio',
        'estatus',
        'prueba_uno'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'estudio' => 'string',
        'estatus' => 'integer',
        'prueba_uno' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'estudio' => 'required',
        'estatus' => 'required'
    ];

    
}
