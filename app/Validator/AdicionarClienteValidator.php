<?php

namespace App\Validator;

use App\Models\Cliente;

class AdicionarClienteValidator
{
    public static function validate($data) {
        $validator = \Validator::make($data, Cliente::$rules, Cliente::$messages);
        if(!$validator->errors()->isEmpty())
            throw new ValidationException($validator, "Erro na validação do Cliente");
        return $validator;
    }
}
