<?php

namespace App\Http\Controllers\Sessao;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SessaoControllerDeslogar extends Controller
{
    public function deslogar() {
        Auth::logout();
        return redirect('/');
    }
}
