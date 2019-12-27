<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use App\Notifications\ResetPasswordNotification;

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
        'pais_id',
        'estado_id',
        'ciudad_id',
        'direccion',
        'telefono',
        'fax',
        'password_admin',
        'facebook_id',
        'twitter_id',
        'google_id',
        'avatar',
        'nick'
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

    public function prealert()
    {
        return $this->hasMany('\App\Prealerta');
    }

    public function paises()
    {
        return $this->belongsTo('\App\Pais', 'pais', 'id_pais');
    }

    public function ciudades()
    {
        return $this->belongsTo('\App\Ciudad', 'ciudad', 'id_ciudad');
    }

    public function creditos()
    {
        return $this->hasMany('\App\Creditos', 'cliente_id', 'id_cliente');
    }
    public function estudios()
    {
        return $this->hasMany('\App\Models\Estudios', 'id_usuario', 'id_cliente');
    }


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function perfiles()
    {
        return $this->belongsTo(RoleUser::class, 'id_cliente', 'user_id_cliente');
    }
}
