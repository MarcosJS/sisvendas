<?php

namespace App\Validator;

use App\Models\Venda;

class InclusaoNomeClienteValidator
{
    public static function validate($data) {
        $rules['nomecliente'] = 'required|min:5|max:100';
        $messages = Venda::$messages;
        $messages['nomecliente.required'] = 'O nome do cliente deve ser informado';

        $validator = \Validator::make($data, $rules, $messages);

        if (!$validator->errors()->isEmpty()) {
            throw new ValidationException($validator, "Erro na inclusão do nome do cliente");
        }
        return $validator;
    }
}
