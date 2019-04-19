<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlanoController extends Controller
{
    //
    public function index(){

    	$titulo = 'Planos Autodicas';

    	return view('admin.plano.index', compact('titulo'));

    }
}
