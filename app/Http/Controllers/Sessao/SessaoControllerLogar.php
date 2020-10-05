<?php

namespace App\Http\Controllers\Sessao;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessaoControllerLogar extends Controller
{
    public function logar(Request $request) {
        $credencias = $request->only('usuario_id');
        //return $credencias;
        //Auth::guard('usuario')->loginUsingId($credencias['usuario_id']);
        Auth::loginUsingId($credencias['usuario_id']);
        //Auth::attempt(['id' => $request->ususario_id]);
        //return Auth::user();
        //return Usuario::find($request->usuario_id);

        if(Auth::check()) {
            return redirect('/');
        }
        return redirect('login');
    }
}
