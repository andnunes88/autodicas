<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Anuncio;
use App\Categoria;

class AnuncioController extends Controller
{
    //
    public function index(){
        
        $registros = Anuncio::all();
        $categorias = Categoria::all();

    	return view('site.home', compact('registros','categorias'));
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

    public function busca(Request $request){
        
        $dados = $request['busca'];
                
        $registros = Anuncio::where("titulo", "like", "%". $dados ."%")
        ->get();                

        return view('site.anuncio.ads', compact('registros'));
    }
}
