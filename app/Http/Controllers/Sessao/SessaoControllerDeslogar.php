<?php

namespace App\Http\Controllers\Sessao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessaoControllerDeslogar extends Controller
{
    public function deslogar(Request $request) {
        $request->session()->flush();
        return redirect('/');
    }
}
