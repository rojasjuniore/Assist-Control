<?php

namespace App\Models;

use App\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Asistencia
 * @package App\Models
 * @version January 21, 2020, 5:28 pm EST
 *
 * @property integer user_id
 */
class Asistencia extends Model
{
    use SoftDeletes;

    public $table = 'asistencias';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'fecha'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'fecha' => 'required',
        'created_at' => 'required'
    ];

    #Funciones para las Relaciones con Tablas Foraneas
    public function usuarios(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
}
