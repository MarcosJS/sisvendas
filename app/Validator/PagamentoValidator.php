<?php

namespace App\Validator;

use App\Models\Venda;

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

        if($validator->errors()->isEmpty()) {
            $venda = Venda::find($data['venda_id']);

            $qtdItens = 0;
            if ($venda != null) {
                $qtdItens = $venda->vendaItens()->count();
            }

            if($qtdItens <= 0) {
                $validator->errors()->add('venda_id', 'Nenhum item foi adicionado a venda');
            }
        }

        if(!$validator->errors()->isEmpty()) {
            throw new ValidationException($validator, "Erro no processamento do pagamento");
        }
        return $validator;
    }
}
