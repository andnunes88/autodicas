<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PagSeguro;
use App\Produto;
use App\Cart;
use Session;

class CartController extends Controller
{
    //
    public function index(){

    	$titulo = 'Planos Autodicas';

        $produtos = Produto::all();
        
    	return view('admin.cart.index', compact('titulo','produtos'));

    }

   
    public function historico(){

    	$titulo = 'Historico de compra Autodicas';

    	return view('admin.cart.historico', compact('titulo')); 
    }

    public function checkout($id_produto, Request $request){

        $titulo ='Pagamento';

        $produto = Produto::where('id', $id_produto)->first();

        $request->session()->put('produto', $produto);
        
        return view('admin.cart.checkout', compact('titulo','produto'));
    }

    public function getPedido(Request $request){

    	$PagSeguro = new PagSeguro();    	
		
		return $PagSeguro->getSessionId();    	

    }

    public function billet(PagSeguro $pagseguro){

        return $pagseguro->paymentBillet($sendHash);

    }
}
