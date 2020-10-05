<?php


namespace App\Validator;


use App\Models\Funcao;

class FuncaoValidator
{
    public static function validate($data) {
        $validator = \Validator::make($data, Funcao::$rules, Funcao::$messages);
        if(!$validator->errors()->isEmpty())
            throw new ValidationException($validator, "Erro na validação da Função");
        return $validator;
    }
}
