<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnuncioController extends Controller
{
    //
    public function index(){
    	return view('site.anuncio.ads');
    }

    public function detalhe(){
    	return view('site.anuncio.detalhe');
    }
}
