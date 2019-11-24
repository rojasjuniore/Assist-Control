<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

use Caffeinated\Shinobi\Traits\ShinobiTrait;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, ShinobiTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = "clientes";
    protected $primaryKey = 'id_cliente';
    protected $fillable = [
                            'nombre',
                            'email',
                            'email_verified_at',
                            'password',
                            'code_cliente',
                            'id_pais',
                            'estado',
                            'ciudad',
                            'direccion',
                            'telefono',
                            'fax'
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
