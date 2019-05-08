<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
use App\Produto;

class Cart extends Model
{
    
    private $item;

    public function __construct(){

        if( Session::has('cart') ) {

            $cart = Session::get('cart');
            
            $this->item = $cart->item;
        }
    }

    public function addProduto(Produto $produto){

    	$this->item = $produto;      	

    }

    public function remover(){

    }

    public function getItems()
    {
        return $this->item;
    }

    public function limparCarrinho(){

        if( Session::has('cart') ){
            Session::forget('cart');
        }
    }

}
