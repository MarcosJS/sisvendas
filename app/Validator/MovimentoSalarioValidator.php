<?php

namespace App\Validator;

use App\Models\Colaborador\MovimentoSalario;

class MovimentoSalarioValidator
{
    public static function validate($data) {
        $validator = \Validator::make($data, MovimentoSalario::$rules, MovimentoSalario::$messages);
        if(!$validator->errors()->isEmpty())
            throw new ValidationException($validator, "Erro na validação do Movimento");
        return $validator;
    }
}
