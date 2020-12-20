<?php

namespace App\Validator;

use App\Models\Caixa\MovimentoCaixa;

class MovimentoCaixaValidator
{
    public static function validate($data) {
        $validator = \Validator::make($data, MovimentoCaixa::$rules, MovimentoCaixa::$messages);
        if(!$validator->errors()->isEmpty())
            throw new ValidationException($validator, "Erro na validação do Endereço");
        return $validator;
    }
}
