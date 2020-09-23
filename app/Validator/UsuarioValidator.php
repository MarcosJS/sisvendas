<?php

namespace App\Validator;

use App\Usuario;

class UsuarioValidator
{
    public static function validate($data) {
        $validator = \Validator::make($data, Usuario::$rules, Usuario::$messages);
        if(!$validator->errors()->isEmpty())
            throw new ValidationException($validator, "Erro na validação do Usuario");
        return $validator;
    }
}
