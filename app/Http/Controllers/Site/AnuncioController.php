<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Anuncio;
use App\Categoria;
use App\EstatisticaAnuncio;
use Illuminate\Support\Facades\DB;

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

        $this->contaVisualizacao($id_anuncio);

    	return view('site.anuncio.detalhe', compact('registro'));
    }

    public function busca(Request $request){
        
       // $dados = trim($request['busca']);
        $dados=trim($request->get('busca'));
             
        $registros  = Anuncio::whereRaw("match(titulo, descricao) against ('" . $dados ."')")->get(); 

        return view('site.anuncio.ads', compact('registros'));
    }

    public function contaVisualizacao($id_anuncio){
                
        $registro = Anuncio::find($id_anuncio);
        
        $EstatisticaAnuncio = EstatisticaAnuncio::where('anuncio_id', $registro->id)->first();        

        if($EstatisticaAnuncio != NULL && $EstatisticaAnuncio != ''){
            $EstatisticaAnuncio = EstatisticaAnuncio::where('anuncio_id', $registro->id)->first();
            $EstatisticaAnuncio->visualizacao = $EstatisticaAnuncio->visualizacao + 1;
            $EstatisticaAnuncio->update();
        }else{
            $EstatisticaAnuncio = new EstatisticaAnuncio();
            $EstatisticaAnuncio->anuncio_id = $registro->id;
            $EstatisticaAnuncio->visualizacao = 1;
            $EstatisticaAnuncio->save();
        }
        
    }

    public function contaContato($id_anuncio){
                
        $registro = Anuncio::find($id_anuncio);
        
        $EstatisticaAnuncio = EstatisticaAnuncio::where('anuncio_id', $registro->id)->first(); 
       
        if($EstatisticaAnuncio != NULL && $EstatisticaAnuncio != ''){
            $EstatisticaAnuncio = EstatisticaAnuncio::where('anuncio_id', $registro->id)->first();
            $EstatisticaAnuncio->contato = $EstatisticaAnuncio->contato + 1;
            $EstatisticaAnuncio->update();
            return 'Contato Atualizado';
        }      
        
    }
}
