<?php

namespace App\Validator;

use App\Models\VendaItem;

class InclusaoItemValidator
{
    public static function validate($request) {
        $validator = \Validator::make($request, VendaItem::$rules, VendaItem::$messages);

        if(!isset($request['codproduto'])) {
            $validator->errors()->add('codproduto', 'Informe um produto');
        }

        if (!$validator->errors()->isEmpty()) {
            throw new ValidationException($validator, "Erro na validação da inclusão do item");
        }
        return $validator;
    }
}
