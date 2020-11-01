<?php

namespace App\Validator;

use App\Models\Produto\Produto;

class ProdutoValidator
{

    public static function validate($data) {
        $validator = \Validator::make($data, Produto::$rules, Produto::$messages);
        if(!$validator->errors()->isEmpty())
            throw new ValidationException($validator, "Erro na validação do Produto");
        return $validator;
    }
}
