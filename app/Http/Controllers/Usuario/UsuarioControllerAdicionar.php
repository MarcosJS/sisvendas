<?php

namespace App\Http\Controllers\Usuario;

use App\Models\Funcao;
use App\Models\Usuario;
use App\Validator\UsuarioValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UsuarioControllerAdicionar extends Controller
{
    public function adicionar(Request $request) {

        try {
            UsuarioValidator::validate($request->all());
            $usuario = new Usuario();
            $usuario->fill($request->except('password', 'funcao'));
            $usuario->password = Hash::make($request->senha);
            $funcao = Funcao::find($request->funcao);
            if($funcao) {
                $funcao->usuarios()->saveMany([$usuario]);
                return redirect()->route('usuarios');
            }
        } catch (ValidationException $exception) {
            return redirect()
                ->back()
                ->withErrors($exception->getValidator())
                ->withInput();
        }
    }
}
