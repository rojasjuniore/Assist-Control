<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagoPromocion extends Model
{
    protected $table = 'pago_promocion';

    protected $primaryKey = 'id';

    public $timestamps = false;

     protected $fillable = [
        'code_cliente',
        'monto', 
        'promocion',
        'metodo',
        'codigo',
        'estatus',
    ];

     public function promocions(){
        return $this->belongsTo('\App\PromocionVar', 'promocion', 'id');
    }
}
