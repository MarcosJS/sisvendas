<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Validator\UsuarioValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;

class UsuarioControllerAdicionar extends Controller
{
    public function adicionar(Request $request) {
        //return $request;
        try {
            UsuarioValidator::validate($request->all());
            $usuario = new Usuario();
            $usuario->fill($request->all());
            if($usuario) {
                $usuario->save();
                return redirect('usuarios');
            }
        } catch (ValidationException $exception) {
            return redirect('usuarios/novo')
                ->withErrors($exception->getValidator())
                ->withInput();
        }
    }
}
