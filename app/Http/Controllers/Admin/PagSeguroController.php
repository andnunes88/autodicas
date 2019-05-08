<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PagSeguro;
use App\Order;
use App\Cart;
use App\Produto;

class PagSeguroController extends Controller
{
    //
    public function pagseguro(PagSeguro $pagseguro){

        $code = $pagseguro->generate();
        
        $urlRedirect = config('pagseguro.url_redirect_after_request').$code;
        
        return redirect()->away($urlRedirect);
    }

    public function getCode(PagSeguro $pagseguro){

        return $pagseguro->getSessionId();
    }

    public function billet(Request $request, PagSeguro $pagseguro, Order $order){	

    	$response = $pagseguro->paymentBillet($request->sendHash); 
    
    	$produto = Produto::where('id', $request['id_produto'])->first();

        $referencia = $produto->referencia;

    	$codigo = md5(uniqid(""));
        
        $order->newOrderProducts($produto, $referencia, $codigo);
             
        return response()->json($response, 200);
        
    }
}
