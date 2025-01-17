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
        
        $planoA = Anuncio::where('ativo',true)
            ->where('relevancia','=','3')
            ->inRandomOrder()
             ->orderBy('relevancia', 'DESC')
             ->take(5)
             ->get();

        $planoB = Anuncio::where('ativo',true)
            ->where('relevancia','=','2')
            ->inRandomOrder()
             ->orderBy('relevancia', 'DESC')
             ->take(5)
             ->get();
             
        $planoC = Anuncio::where('ativo',true)
            ->where('relevancia','<=','1')
            ->inRandomOrder()
             ->orderBy('relevancia', 'DESC')
             ->take(5)
             ->get(); 
            
        $categorias = Categoria::has('Anuncio')->get();
        
    	return view('site.home', compact('categorias', 'planoA', 'planoB', 'planoC'));
    }

    public function ads($id_categoria = NULL){

        if($id_categoria != NULL){
            
            $registros = Anuncio::where('ativo',true)
            ->Where('categoria_id', $id_categoria)
            ->inRandomOrder()            
            ->orderBy('relevancia', 'DESC')
            ->paginate(25);

        }else{
            
            $registros = Anuncio::where('ativo',true)
            ->inRandomOrder()
            ->orderBy('relevancia', 'DESC')
            ->paginate(25);
        }        

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
        
        $dados=trim($request->get('busca'));
             
        $registros  = Anuncio::whereRaw("match(titulo, descricao) against ('" . $dados ."')")->paginate(20); 

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
