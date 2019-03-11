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

    public function detalhe($anuncio_slug, $id_anuncio){
                
        $registro = Anuncio::where('anuncio_slug', $anuncio_slug)
        ->where('id', $id_anuncio)
        ->first();

    	return view('site.anuncio.detalhe', compact('registro'));
    }
}
