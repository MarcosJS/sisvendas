<?php

namespace App\Validator;

use App\Models\Produto;
use App\Models\VendaItem;

class InclusaoItemValidator
{
    public static function validate($request) {
        $validator = \Validator::make($request, VendaItem::$rules, VendaItem::$messages);

        if(!isset($request['codproduto'])) {
            $validator->errors()->add('codproduto', 'Informe um produto');
        } else {
            $produto = Produto::find($request['codproduto']);
            if(!$validator->errors()->has('qtd') && $request['qtd'] > $produto->estoque) {
                $validator->errors()->add('qtd', 'Quantidade informada maior do que o estoque do produto');
            }
        }

        if (!$validator->errors()->isEmpty()) {
            throw new ValidationException($validator, "Erro na validação da inclusão do item");
        }
        return $validator;
    }
}
