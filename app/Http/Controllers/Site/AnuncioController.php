<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Anuncio;

class AnuncioController extends Controller
{
    //
    public function index(){
        
        $registros = Anuncio::all();

    	return view('site.home', compact('registros'));
    }

    public function ads(){

        $registros = Anuncio::all();

    	return view('site.anuncio.ads', compact('registros'));
    }

    public function detalhe(){
    	return view('site.anuncio.detalhe');
    }
}
