<?php

namespace App\Validator;

use App\Models\Pagamento\Emitente;

class EmitenteValidator
{
    public static function validate($data) {
        $validator = \Validator::make($data, Emitente::$rules, Emitente::$messages);
        if(!$validator->errors()->isEmpty())
            throw new ValidationException($validator, "Erro na validação do Emitente");
        return $validator;
    }

}
