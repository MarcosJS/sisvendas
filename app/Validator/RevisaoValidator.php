<?php

namespace App\Validator;

use App\Models\Venda;

class RevisaoValidator
{
    public static function validate($data) {
        $rules = [
            'cliente' => 'required'
        ];

        $messages = [
            'cliente.*' => 'Nenhum cliente foi selecionado'
        ];
        $validator = \Validator::make($data, $rules, $messages);

        $venda = Venda::find($data['venda_id']);
        $pagamentos = $venda->pagamentos;
        if(count($pagamentos) == 0) {
            $validator->errors()->add('pagamento', 'Nenhum pagamento foi realizado');
        } else{
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
