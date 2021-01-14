<?php

namespace App\Validator;


use App\Models\Pagamento\Transferencia;

class TransferenciaValidator
{
    public static function validate($data) {
        $validator = \Validator::make($data, Transferencia::$rules, Transferencia::$messages);
        if(!$validator->errors()->isEmpty()) {
            throw new ValidationException($validator, "Erro na validação da Transferencia");
        }
        return $validator;
    }

}
