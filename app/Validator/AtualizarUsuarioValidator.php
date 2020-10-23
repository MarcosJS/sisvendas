<?php

namespace App\Validator;

use App\Models\Usuario;

class AtualizarUsuarioValidator
{
    public static function validate($data) {
        $rules = Usuario::$rules;
        unset($rules['cpf']);
        unset($rules['password']);
        unset($rules['funcao']);
        $validator = \Validator::make($data, $rules, Usuario::$messages);
        if(!$validator->errors()->isEmpty())
            throw new ValidationException($validator, "Erro na validação do Usuario");
        return $validator;
    }

}
