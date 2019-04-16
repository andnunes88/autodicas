<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categoria;

class Categoria extends Model
{
	//
	protected $fillable   = [
		'categoria_nome',
		'id_pai_categoria',
		'categoria_slug',
		'categoria_imagem'
	];

    public function produto(){
    	return $this->hasMany('App\Anuncio');
    }
}

