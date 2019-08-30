<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\Estado;
use App\Cidade;
use App\EstatisticaAnuncio;
use App\Anuncio;

class UsuarioController extends Controller
{
    //
    public function index(){

    	$titulo = "Dashboard";
        
        $id = Auth::id();

    	$total_produtos = Anuncio::where('usuario_id',$id)->get();

        $totalVisualizacao = $this->totalVisualizacao();

        $this->verificaPerfilPreenchido();

        return view('admin.index', compact('titulo','total_produtos','totalVisualizacao'));

    }

    public function dashboard(){
       
       $id = Auth::id();
       $titulo = 'Dashboard';
       $total_produtos = [];
       $qtd_produtos_categoria = [];
       $total_click_mes = [];
        
       return view('admin.dashboard', compact('titulo','total_produtos', 'qtd_produtos_categoria', 'total_click_mes'));
        
    }   
  
    public function sair(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function ExibirFormPerfil(){
        
        $titulo = 'Perfil Do Usuário';

        $id_usuario = Auth::id();

        $usuario = User::where('telefone', '<>', NULL)->first();

        $estados = Estado::all(); 

        $cidades = [];

        if(isset($usuario) && $usuario->count() > 0){

            return $this->editar($id_usuario);
         
        }

        return view('admin.usuario.index', compact('titulo', 'estados', 'cidades'));
    }

    public function completarPerfil(Request $request){
         
         $id_usuario = Auth::id();   
         $dados = $request->all();
         $slug = str_slug($dados['nome'], '-');              

         $perfil = User::find($id_usuario);          
        

         $perfil->name = $dados['nome'];        
         $perfil->telefone = $dados['telefone'];
         $perfil->cpf = isset($dados['cpf']) ? $dados['cpf'] : NULL;
         $perfil->cnpj = isset($dados['cnpj']) ? $dados['cnpj'] : NULL;
         $perfil->cep = $dados['cep'];
         $perfil->estado_id = $dados['estado_id'];
         $perfil->cidade_id = $dados['cidade_id'];
         $perfil->endereco = $dados['endereco'];
         $perfil->numero = $dados['numero'];
         $perfil->complemento = $dados['complemento'];
         $perfil->usuario_slug = $slug;

         $perfil->update();

         \Session::flash('mensagem',['msg'=>'Dados do Perfil atualizados com sucesso!','class'=>'alert alert-success']);

         return redirect()->route('admin.perfil');
    }

    public function editar($id_usuario){
    
        $titulo = 'Editar Perfil';

        $registro = User::find($id_usuario);

        $estados = Estado::all();
  
        return view('admin.usuario.editar', compact("titulo", "registro", "estados"));
    
   }

    public function atualizar(Request $request, $id_perfil){
     
         $dados = $request->all();
         $slug = str_slug($dados['nome'], '-');
         
         $perfil = User::find($id_perfil);

         $perfil->name = $dados['nome'];
        
         $perfil->telefone = $dados['telefone'];
         $perfil->cpf = isset($dados['cpf']) ? $dados['cpf'] : NULL;
         $perfil->cnpj = isset($dados['cnpj']) ? $dados['cnpj'] : NULL;
         $perfil->cep = $dados['cep'];
         $perfil->estado_id = $dados['estado_id'];
         $perfil->cidade_id = $dados['cidade_id'];
         $perfil->endereco = $dados['endereco'];
         $perfil->numero = $dados['numero'];
         $perfil->complemento = $dados['complemento'];
         $perfil->usuario_slug = $slug;

        $perfil->update();

        \Session::flash('mensagem',['msg'=>'Dados do Perfil atualizados com sucesso!','class'=>'alert alert-success']);

        return redirect()->route('admin.perfil');
    }

    public function pegarCidadesDoEstado($id_estado = NULL){
        
        $cidades = Cidade::where('estado_id', $id_estado)->get();
        
        return $cidades;

    }

    public function totalVisualizacao(){
        
        $id_usuario = Auth::id(); 
        
        $query = DB::table('users')
            ->select(DB::raw('SUM(visualizacao) AS total'))
            ->join('anuncios', 'anuncios.usuario_id', '=', 'users.id')
            ->join('estatistica_anuncios', 'estatistica_anuncios.anuncio_id', '=', 'anuncios.id')
            ->where('users.id', $id_usuario)
            ->get();
 

        $totalVisualizacao = $query[0]->total;

        return $totalVisualizacao;

    }

     public function verificaPerfilPreenchido(){
        
        $id_usuario = Auth::id();
        
        $usuario = User::find($id_usuario);
       
        if(($usuario->telefone == NULL)){
            \Session::flash('mensagem',['msg'=>'Complete seu perfil','class'=>'alert alert-danger']);
            return redirect()->route('admin.perfil'); 
        }

    }

     public function estatistica(){      

        $id_usuario = Auth::id();

        $estatisticas = DB::table('anuncios')
            ->select('anuncios.titulo','estatistica_anuncios.visualizacao', 'estatistica_anuncios.contato')
            ->join('estatistica_anuncios', 'estatistica_anuncios.anuncio_id', '=', 'anuncios.id')
            ->where('anuncios.usuario_id', $id_usuario)
            ->orderBy('visualizacao','DESC')
            ->get();    

        $titulo = 'Estatistica';
        
        return view('admin.estatistica.index', compact('titulo', 'estatisticas'));
    }


}
