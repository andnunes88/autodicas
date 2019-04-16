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
}
