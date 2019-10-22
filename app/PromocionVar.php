<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromocionVar extends Model
{
      protected $table = 'promocion_var';

    protected $primaryKey = 'id';

    public $timestamps = false;

     protected $fillable = [
        'id_promocion',
        'peso', 
        'precio',
    ];

    public function promocion(){
        return $this->belongsTo('\App\Promocion', 'id_promocion', 'id');
    }

}
