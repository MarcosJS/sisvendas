<?php

namespace App\Http\Controllers\Usuario;

use App\Models\Usuario;
use App\Validator\AtualizarUsuarioValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsuarioControllerAtualizar extends Controller
{
    public function atualizar(Request $request) {
        try {
            AtualizarUsuarioValidator::validate($request->all());
            $usuario = Usuario::find($request->idusuario);
            if($usuario) {
                $usuario->nome = $request->nome;
                $usuario->email = $request->email;
                $usuario->cpf = $request->cpf;
                $usuario->matricula = $request->matricula;
                $usuario->save();
                return redirect()->route('usuario', $usuario->id);
            }
        } catch (ValidationException $exception) {
            return redirect()
                ->back()
                ->withErrors($exception->getValidator())
                ->withInput();
        }
    }
}
