<?php

namespace App\Validator;

use App\Models\Producao;

class ProducaoValidator
{
    public static function validate($data) {
        $validator = \Validator::make($data, Producao::$rules, Producao::$messages);
        if(!$validator->errors()->isEmpty()) {
            throw new ValidationException($validator, "Erro na validação dos dados de producao");
        }
        return $validator;
    }
}
