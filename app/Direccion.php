<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = 'direccion_cliente';

    protected $primaryKey = 'id_direccion_cliente';

    public $timestamps = false;

     protected $fillable = [
        'id_cliente',
        'direccion', 
        'id_pais',
        'id_ciudad',
    ];
    public function cliente(){
    	return $this->belongsTo('\App\User', 'id_cliente', 'id_cliente');
    }
    public function paises(){
        return $this->belongsTo('\App\Pais', 'id_pais', 'id_pais');
    }
     public function ciudades(){
        return $this->belongsTo('\App\Ciudad', 'id_ciudad', 'id_ciudad');
    }
}
