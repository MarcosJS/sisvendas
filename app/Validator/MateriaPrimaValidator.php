<?php

namespace App\Validator;

use App\Models\MateriaPrima\MateriaPrima;

class MateriaPrimaValidator
{

    public static function validate($data) {
        $validator = \Validator::make($data, MateriaPrima::$rules, MateriaPrima::$messages);
        if(!$validator->errors()->isEmpty())
            throw new ValidationException($validator, "Erro na validação do Produto");
        return $validator;
    }
}
