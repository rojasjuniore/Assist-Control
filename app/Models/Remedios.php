<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Remedios
 * @package App\Models
 * @version November 3, 2019, 4:52 pm EST
 *
 * @property integer idMatMed
 * @property integer id_cremedios
 * @property integer col_c
 * @property integer col_d
 * @property integer col_e
 * @property integer pregnancia
 * @property string nombre
 * @property integer tipoClasico
 * @property integer tipoPolicresto
 * @property integer tipoAvanzado
 * @property integer tipoRemedioClave
 * @property integer puros
 * @property string secuencia
 */
class Remedios extends Model
{
    use SoftDeletes;

    public $table = 'remedios';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'idMatMed',
        'id_cremedios',
        'col_c',
        'col_d',
        'col_e',
        'pregnancia',
        'nombre',
        'tipoClasico',
        'tipoPolicresto',
        'tipoAvanzado',
        'tipoRemedioClave',
        'puros',
        'secuencia'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'idMatMed' => 'integer',
        'id_cremedios' => 'integer',
        'col_c' => 'integer',
        'col_d' => 'integer',
        'col_e' => 'integer',
        'pregnancia' => 'integer',
        'nombre' => 'string',
        'tipoClasico' => 'integer',
        'tipoPolicresto' => 'integer',
        'tipoAvanzado' => 'integer',
        'tipoRemedioClave' => 'integer',
        'puros' => 'integer',
        'secuencia' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_cremedios' => 'required',
        'col_c' => 'required',
        'col_d' => 'required',
        'col_e' => 'required',
        'pregnancia' => 'required',
        'nombre' => 'required',
        'tipoClasico' => 'required',
        'tipoPolicresto' => 'required',
        'tipoAvanzado' => 'required',
        'tipoRemedioClave' => 'required',
        'puros' => 'required'
    ];

    
}
