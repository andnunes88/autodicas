<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    //
    protected $fillable   = ['usuario_id','categoria_id', 'titulo','descricao', 'valor', 'imagem', 'anuncio_slug', 'relevancia', 'status','ativo','habilitado', 'spam', 'expira'];

    public function categoria(){
    	return $this->belongsTo('App\Categoria');
    }

    public function usuario(){
    	return $this->belongsTo('App\User');
    }

    public function estatistica(){
    	return $this->hasOne('App\EstatisticaAnuncio');
    }


}
