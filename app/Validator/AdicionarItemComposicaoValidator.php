<?php

namespace App\Validator;

use App\Models\Produto\ItemComposicao;

class AdicionarItemComposicaoValidator
{
    public static function validate($request) {
        $validator = \Validator::make($request, ItemComposicao::$rules, ItemComposicao::$messages);

        if (Session()->has('itens')) {
            $itens = Session()->get('itens');

            foreach ($itens as $item) {
                if($request['material'] == $item['material']->id) {
                    $validator->errors()->add('material', 'O material já foi incluido na lista');
                    break;
                }
            }
        }

        if (!$validator->errors()->isEmpty()) {
            throw new ValidationException($validator, "Erro na validação da inclusão do item");
        }
        return $validator;
    }
}
