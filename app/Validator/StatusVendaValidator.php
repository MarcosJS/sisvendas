<?php

namespace App\Validator;

use App\Models\StatusVenda;

class StatusVendaValidator
{
    public static function validate($data) {
        $validator = \Validator::make($data, StatusVenda::$rules, StatusVenda::$messages);
        if(!$validator->errors()->isEmpty())
            throw new ValidationException($validator, "Erro na validação do Status da Venda");
        return $validator;
    }
}
