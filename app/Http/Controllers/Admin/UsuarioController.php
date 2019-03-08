<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{
    //
    public function index(){

    	$titulo = "Dashboard";
    	
    	return view('admin.index', compact('titulo'));

    }
}
