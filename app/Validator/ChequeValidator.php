<?php

namespace App\Validator;

use App\Models\Pagamento\Cheque;

class ChequeValidator
{
    public static function validate($data) {
        $validator = \Validator::make($data, Cheque::$rules, Cheque::$messages);
        if(!$validator->errors()->isEmpty()) {
            throw new ValidationException($validator, "Erro na validação do Cheque");
        }
        return $validator;
    }

}
