<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = "clientes";
    protected $primaryKey = 'id_cliente';
    protected $fillable = [
        'nombre', 
        'apellidos', 
        'fecha_nacimiento', 
        'telefono', 
        'ciudad', 
        'pais', 
        'direccion', 
        'email', 
        'password',
        'code_cliente',
        'customer_stripe',
        'cliente_envio',
    ];
    public $timestamps = false;



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     public function prealert(){
        return $this->hasMany('\App\Prealerta');
    }

      public function paises(){
        return $this->belongsTo('\App\Pais', 'pais', 'id_pais');
    }
     public function ciudades(){
        return $this->belongsTo('\App\Ciudad', 'ciudad', 'id_ciudad');
    }
}
