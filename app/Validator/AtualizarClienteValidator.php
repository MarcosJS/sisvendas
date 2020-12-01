<?php

namespace App\Validator;

use App\Models\Cliente;

class AtualizarClienteValidator
{
    public static function validate($data) {
        $rules = Cliente::$rules;
        unset($rules['cpf']);

        $validator = \Validator::make($data, $rules, Cliente::$messages);
        if(!$validator->errors()->isEmpty())
            throw new ValidationException($validator, "Erro na validação do Cliente");
        return $validator;
    }

}
