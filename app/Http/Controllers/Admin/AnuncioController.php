<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categoria;
use App\Anuncio;
use Auth;
use App\EstatisticaAnuncio;

class AnuncioController extends Controller
{
    //
     public function index(){

        $titulo = "Anuncios";

        $usuario_id = Auth::id();

        $registros = $this->verificaAnuncioExpirou($usuario_id);       
        
        return view('admin.anuncio.index', compact("titulo", "registros"));
    }

       
    public function addAnuncio(){

        $titulo = "Inserir Anúncio";

        $categorias = Categoria::all();

        return view('admin.anuncio.adicionar', compact("titulo", "categorias"));
    }

    public function salvar(Request $request){
        
        $dados = $request->all();
        
        $id_usuario = Auth::id();

        $slug = str_slug($dados['titulo'], '-');

        $anuncio = new Anuncio;
        $anuncio->usuario_id = $id_usuario;
        $anuncio->categoria_id = $dados['categoria'];
        $anuncio->titulo = $dados['titulo'];
        $anuncio->descricao = $dados['descricao'];
        //$anuncio->valor = str_replace(',', '.', str_replace('.', '', $dados['valor']));
        $anuncio->valor = $dados['valor'];
        
        $file = $request->file('imagem');        
        if($file){
            $rand = rand(11111,99999);
            $diretorio = "img/anuncios/".$id_usuario."/";
            $ext = $file->guessClientExtension();
            $nomeArquivo = "_img_".$rand.".".$ext;
            $file->move($diretorio, $nomeArquivo);
            $anuncio->imagem = $diretorio.'/'.$nomeArquivo;
        }

        $anuncio->anuncio_slug =  $slug;
        $anuncio->relevancia = 0;
        $anuncio->status = 'ativo';
        $anuncio->expira = date('Y-m-d H:m:s', strtotime('+1 month'));

        $anuncio->save();

        \Session::flash('mensagem',['msg'=>'Anúncio cadastrado com sucesso!','class'=>'alert alert-success']);

        return redirect()->route('admin.anuncios');

    }

    public function editar($id_anuncio){

        $titulo = 'Autodicas - Editar'; 

        $categorias = Categoria::all();

        $registro = Anuncio::where('id',$id_anuncio)->first();      
       
        return view('admin.anuncio.editar', compact('registro', 'titulo', 'categorias'));
       
    }

    public function atualizar(Request $request, $id_anuncio){
        
        $dados = $request->all();
        
        $id_usuario = Auth::id();

        $slug = str_slug($dados['titulo'], '-');

        $anuncio = Anuncio::find($id_anuncio);
        $anuncio->categoria_id = $dados['categoria'];
        $anuncio->titulo = $dados['titulo'];
        $anuncio->descricao = $dados['descricao'];
        $anuncio->valor = $dados['valor'];
                
        $file = $request->file('imagem');
        if($file){
            $rand = rand(11111,99999);
            $diretorio = "img/anuncios/".$id_usuario."/";
            $ext = $file->guessClientExtension();
            $nomeArquivo = "_img_".$rand.".".$ext;
            $file->move($diretorio, $nomeArquivo);
            $anuncio->imagem = $diretorio.'/'.$nomeArquivo;
        }

        $anuncio->anuncio_slug =  $slug;
        $anuncio->relevancia = 0;

        $anuncio->update();

        \Session::flash('mensagem',['msg'=>'Anúncio Atualizado com sucesso!','class'=>'alert alert-success']);

        return redirect()->route('admin.anuncios');

    }

    public function deletar($id){
        
        $registro = Anuncio::find($id);

        $registro->delete();

        \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!','class'=>'alert alert-success']);

        return redirect()->route('admin.anuncios');
    }

    public function verificaAnuncioExpirou($usuario_id){

        $data_atual = date('Y-m-d');

        $registros = Anuncio::where('usuario_id', $usuario_id)->get();

        if($registros->count() > 0){
            
            foreach ($registros as $registro) {
                
                if($data_atual  > $registro->expira){

                    $registro->status = 'expirado';

                    \Session::flash('mensagem',['msg'=>'Seus anúncios expirados podem ser renovados','class'=>'alert alert-danger']);
                }   

            }
            
        }

        return $registros;        
    }

   
    
}
