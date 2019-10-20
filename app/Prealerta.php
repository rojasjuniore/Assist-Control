<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Prealerta extends Model
{
    protected $table = 'ordenes_cliente';

    protected $primaryKey = 'id_orden_cli';

    public $timestamps = false;

    protected $fillable = [
        'id_cli', 
        'nu_orden', 
        'tienda', 
        'descripcion', 
        'doc', 
        'valor', 
        'tracking', 
        'courier', 
        'fecha',
        'estatus',
        'direccion',
        'tipo_envio',
        'id_direccion'
    ];

    public function cliente(){
    	return $this->belongsTo('\App\User', 'id_cli', 'id_cliente');
    }
}
