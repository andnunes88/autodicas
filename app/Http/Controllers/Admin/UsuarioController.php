<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Estado;
use App\Cidade;

class UsuarioController extends Controller
{
    //
    public function index(){

    	$titulo = "Dashboard";
    	
    	return view('admin.index', compact('titulo'));

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
         //$perfil->tipo = $dados['tipo'];
         $perfil->telefone = $dados['telefone'];
         $perfil->cpf = isset($dados['cpf']) ? $dados['cpf'] : NULL;
         $perfil->cnpj = isset($dados['cnpj']) ? $dados['cnpj'] : NULL;
         $perfil->cep = $dados['cep'];
         $perfil->estado_id = $dados['estado_id'];
         $perfil->cidade_id = $dados['cidade_id'];
         $perfil->endereco = $dados['endereco'];
         $perfil->usuario_slug = $slug;

        $perfil->update();

        \Session::flash('mensagem',['msg'=>'Dados do Perfil atualizados com sucesso!','class'=>'alert alert-success']);

        return redirect()->route('admin.perfil');
    }

    public function pegarCidadesDoEstado($id_estado = NULL){
        
        $cidades = Cidade::where('estado_id', $id_estado)->get();
        
        return $cidades;

    }
}
