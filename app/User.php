<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use App\Notifications\ResetPasswordNotification;


use Caffeinated\Shinobi\Traits\ShinobiTrait;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable, ShinobiTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = "users";
    protected $primaryKey = 'id';
    protected $fillable = [
        'avatar',
        'nombre',
        'nick',
        'password',
        'email',
        'telefono',
        'fax',
        'pais_id',
        'estado_id',
        'ciudad_id',
        'direccion',
        'facebook_id',
        'twitter_id',
        'google_id',
        'password_admin',
        'completeData',
        'email_verified_at'
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

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function paises()
    {
        return $this->belongsTo('\App\Pais', 'pais_id', 'id');
    }

    public function estados()
    {
        return $this->belongsTo('\App\Estado', 'estado_id', 'id');
    }

    public function ciudades()
    {
        return $this->belongsTo('\App\Ciudad', 'ciudad_id', 'id');
    }

    public function perfiles()
    {
        return $this->belongsTo(RoleUser::class, 'id', 'user_id');
    }


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

}
