<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PagSeguro;

class CartController extends Controller
{
    //
    public function index(){

    	$titulo = 'Planos Autodicas';

    	return view('admin.cart.index', compact('titulo'));

    }

    public function historico(){

    	$titulo = 'Historico de compra Autodicas';

    	return view('admin.cart.historico', compact('titulo')); 
    }

    public function checkout(){
        return view('cart.checkout');
    }

    public function getPedido(Request $request){

    	$PagSeguro = new PagSeguro();

    	//$dados =  $request->all();
		
		return $PagSeguro->getSessionId();

    	//return $dados;

    }

    public function billet(PagSeguro $pagseguro){

        return $pagseguro->paymentBillet($sendHash);

    }
}
