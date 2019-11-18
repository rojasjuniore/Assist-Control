<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Medicamento
 * @package App\Models
 * @version October 31, 2019, 8:42 am EDT
 *
 * @property string nombre
 * @property string descripcion
 * @property string image
 */
class Medicamento extends Model
{
    use SoftDeletes;

    public $table = 'medicamentos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'descripcion',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'descripcion' => 'string',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'descripcion' => 'required'
    ];

    
}
