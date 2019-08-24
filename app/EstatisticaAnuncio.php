<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstatisticaAnuncio extends Model
{
    //

    public function anuncio(){
    	return $this->belongsTo('App\Anuncio');
    }
}
