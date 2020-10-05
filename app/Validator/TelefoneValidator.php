<?php

namespace App\Validator;

use App\Models\Telefone;

class TelefoneValidator
{
    public static function validate($data) {
        $validator = \Validator::make($data, Telefone::$rules, Telefone::$messages);
        if(!$validator->errors()->isEmpty())
            throw new ValidationException($validator, "Erro na validação do Telefone");
        return $validator;
    }
}
