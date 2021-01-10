<?php

namespace App\Validator;

use App\Models\Colaborador\Colaborador;

class AdicionarColaboradorValidator
{
    public static function validate($data) {
        $validator = \Validator::make($data, Colaborador::$rules, Colaborador::$messages);
        if(!$validator->errors()->isEmpty())
            throw new ValidationException($validator, "Erro na validação do Colaborador");
        return $validator;
    }
}
