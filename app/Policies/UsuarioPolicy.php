<?php

namespace App\Policies;

use App\Models\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsuarioPolicy
{
    use HandlesAuthorization;

    public function novo($usuario)
    {
        return ($usuario->funcao->nivel === 2);
    }

    public function adicionar(Usuario $usuario)
    {
        return $usuario->funcao->nivel === 2;
    }

    public function atualizar(Usuario $usuario, Usuario $novoUsuario)
    {
        //
    }


}
