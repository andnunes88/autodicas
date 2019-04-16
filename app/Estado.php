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
}
