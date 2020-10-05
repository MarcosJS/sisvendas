<?php

namespace App\Validator;

use App\Models\Venda;

class VendaValidator
{
    public static function validate($data) {
        $validator = \Validator::make($data, Venda::$rules, Venda::$messages);
        if(!$validator->errors()->isEmpty())
            throw new ValidationException($validator, "Erro na validação da Venda");
        return $validator;
    }
}
