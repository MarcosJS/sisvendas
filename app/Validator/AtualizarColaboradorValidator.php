<?php

namespace App\Validator;

use App\Models\Colaborador\Colaborador;

class AtualizarColaboradorValidator
{
    public static function validate($data) {
        $rules = Colaborador::$rules;
        unset($rules['cpf']);

        $validator = \Validator::make($data, $rules, Colaborador::$messages);
        if(!$validator->errors()->isEmpty())
            throw new ValidationException($validator, "Erro na validação do Colaborador");
        return $validator;
    }
}
