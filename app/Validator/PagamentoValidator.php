<?php

namespace App\Validator;

class PagamentoValidator
{
    public static function validate($data) {
        $rules = [
            'venda_id' => 'required'
        ];

        $messages = [
            'venda_id.*' => 'Nenhuma venda foi iniciada ainda'
        ];

        $validator = \Validator::make($data, $rules, $messages);

        if(!$validator->errors()->isEmpty()) {
            throw new ValidationException($validator, "Erro no processamento do pagamento");
        }
        return $validator;
    }
}
