<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    //
    protected $fillable   = [
		'estado_nome',
        'estado_slug',
        'uf',
        'pais'
	];

	public function usuarios(){

		return $this->hasMany('App\User');
	}

	//pega todos os anuncios do estado
	public function anuncios(){

		return $this->hasManyThrough(
			'App\Anuncio', 
			'App\User',
			'estado_id', // Chave estrageira na tabela de user
			'usuario_id', // Chave estrageira na tabela de anuncio
			'id', //chave local na tebela de estado
			'id' // chave local na tabela de user
			
		);
	}
}
