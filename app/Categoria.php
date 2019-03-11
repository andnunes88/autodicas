<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categoria;

class Categoria extends Model
{
    //

    public function produto(){
    	return $this->hasMany('App\Anuncio');
    }
}
