<?php

namespace App\Validator;

use App\Models\Venda;

class RevisaoValidator
{
    public static function validate($data) {
        $rules = [
            'pagamento' => 'required'
        ];

        $messages = [
            'pagamento.required' => 'Nenhum pagamento foi realizado'
        ];

        $validator = \Validator::make($data, $rules, $messages);


        $venda = Venda::find($data['venda_id']);

        $pagamentos = $venda->pagamentos;

        if($validator->errors()->isEmpty()) {
            $somaPagamento = 0;
            foreach ($pagamentos as $pagamento) {
                $somaPagamento += $pagamento->valor;
            }
            if ($somaPagamento != $venda->totalliq) {
                $validator->errors()->add('pagamento', 'Soma dos pagamentos é diferente do valor da compra');
            }
        }

        if(!$validator->errors()->isEmpty()) {
            throw new ValidationException($validator, "Erro na revisao da venda");
        }
        return $validator;
    }

}
