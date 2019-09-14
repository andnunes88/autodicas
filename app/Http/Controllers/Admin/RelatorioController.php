<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RelatorioController extends Controller
{
    //
    public function index(){
    	$titulo = "Relatórios Autodicas";
    	return view('admin.relatorio.index', compact('titulo'));
    }

    public function AnunciosMaisVisitados(){
    	$titulo = "Anúncios com mais visitas";

    	$estatisticas = DB::table('anuncios')
            ->select('anuncios.titulo','estatistica_anuncios.visualizacao', 'estatistica_anuncios.contato', 'users.name')
            ->join('estatistica_anuncios', 'estatistica_anuncios.anuncio_id', '=', 'anuncios.id')
            ->join('users', 'users.id', '=', 'anuncios.usuario_id')            
            ->orderBy('visualizacao','DESC')
            ->get();  
            
    	return view('admin.relatorio.anuncios_visitas', compact('titulo', 'estatisticas'));
    }
}
