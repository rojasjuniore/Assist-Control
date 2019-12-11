<?php

namespace App\Models;

use Eloquent as Model;
use App\Pais;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Estudios
 * @package App\Models
 * @version November 3, 2019, 4:54 pm EST
 *
 * @property integer id_usuario
 * @property string tipo
 * @property string h_nombre
 * @property string h_apellido
 * @property string h_identifica
 * @property string h_iniciales
 * @property integer h_dia
 * @property integer h_mes
 * @property integer h_anio
 * @property string h_pais
 * @property string a_especie
 * @property string a_duenio
 * @property string a_animal
 * @property string a_iniciales
 * @property integer a_dia
 * @property integer a_mes
 * @property integer a_anio
 * @property string ip
 * @property string user_agent
 * @property string|\Carbon\Carbon fecha
 */
class Estudios extends Model
{
    use SoftDeletes;

    public $table = 'estudios_realizados';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_usuario',
        'tipo',
        'h_nombre',
        'h_apellido',
        'h_identifica',
        'h_iniciales',
        'h_dia',
        'h_mes',
        'h_anio',
        'h_pais',
        'pais_id',
        'a_especie',
        'a_duenio',
        'a_animal',
        'a_iniciales',
        'a_dia',
        'a_mes',
        'a_anio',
        'ip',
        'user_agent',
        'fecha'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_usuario' => 'integer',
        'tipo' => 'string',
        'h_nombre' => 'string',
        'h_apellido' => 'string',
        'h_identifica' => 'string',
        'h_iniciales' => 'string',
        'h_dia' => 'integer',
        'h_mes' => 'integer',
        'h_anio' => 'integer',
        'h_pais' => 'string',
        'a_especie' => 'string',
        'a_duenio' => 'string',
        'a_animal' => 'string',
        'a_iniciales' => 'string',
        'a_dia' => 'integer',
        'a_mes' => 'integer',
        'a_anio' => 'integer',
        'ip' => 'string',
        'user_agent' => 'string',
        'fecha' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_usuario' => 'required',
        'tipo' => 'required',
        'ip' => 'required',
        'user_agent' => 'required',
        'fecha' => 'required'
    ];

    public function pais(){
        return $this->belongsTo('App\Pais', 'pais_id', 'id');
    }
    
}
