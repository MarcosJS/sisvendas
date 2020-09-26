<?php

namespace App\Validator;

use App\Models\Venda;
use App\Models\VendaItem;

class InclusaoItemValidator
{
    public static function validate($request) {
        $validator = \Validator::make($request, VendaItem::$rules, VendaItem::$messages);

        if(!isset($request['codproduto'])) {
            $validator->errors()->add('codproduto', 'Informe um produto');
        }

        if ($request->session()->get('LastTokenFormItem') != $request->_token) {
            $validator->errors()->add('codproduto', 'Este item já esta na lista');
        }

        if (!$validator->errors()->isEmpty()) {
            throw new ValidationException($validator, "Erro na validação da inclusão do item");
        }
    }
}
