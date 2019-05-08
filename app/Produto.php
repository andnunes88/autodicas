<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Produto extends Model
{
    private $produto;
    
    public function __construct()
    {
        if( Session::has('produto') ) {

            $produtoSessao = Session::get('produto');          

            $this->produto = $produtoSessao;
        }
    }

    public function getProduto() {
    	return $this->produto;
    }

    public function limparSessao(){

    	if( Session::has('produto') ){
            Session::forget('produto');
    	}
    }
}
