<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    //
    protected $fillable   = [
    	'cidade_nome',
    	'cidade_slug'
    ];

    //pega todos os anuncios da cidade
	public function anuncios(){

		return $this->hasManyThrough(
			'App\Anuncio', 
			'App\User',
			'cidade_id', // Chave estrageira na tabela de user
			'usuario_id', // Chave estrageira na tabela de anuncio
			'id', //chave local na tebela de cidade
			'id' // chave local na tabela de user
			
		);
	}
}
