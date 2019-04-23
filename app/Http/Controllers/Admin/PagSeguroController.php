<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PagSeguro;

class PagSeguroController extends Controller
{
    //
    public function getCode(PagSeguro $pagseguro)
    {
        return $pagseguro->getSessionId();
    }

    public function billet(Request $request, PagSeguro $pagseguro)
    {
        return $pagseguro->paymentBillet($request->sendHash);
    }
}
