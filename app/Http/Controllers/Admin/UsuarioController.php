<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

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

     public function login(Request $request)
    {
    	$dados = $request->all();    	
        
    	if(Auth::attempt(['email'=>$dados['email'],'password'=>$dados['password']])){
    		
    		\Session::flash('mensagem',['msg'=>'Login realizado com sucesso!','class'=>'alert alert-success']);

           	return redirect()->route('admin.dashboard');
    	}

    	\Session::flash('mensagem',['msg'=>'Erro! Confira seus dados!','class'=>'alert alert-danger']);

    	return redirect()->route('admin.login');
    }

    public function sair(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function adicionar(){
        return view('admin.login.registrar');
    }

    public function salvar(Request $request){
        $dados = $request->all();
        
        $email = $dados['email'];

        $nome = explode("@", $email);

        $usuario = new User();
        $usuario->name = $nome[0];
        $usuario->email = $dados['email'];
        $usuario->password = bcrypt($dados['password']);
        $usuario->save();       

        \Session::flash('mensagem',['msg'=>'Registro criado com sucesso! Você pode entrar no sistema','class'=>'alert alert-success']);

        return redirect()->route('admin.login');
    }
}
