<?php


namespace App\Validator;


use App\Models\Venda;

class FinalizarVendaValidator
{
    public static function validate($data) {
        $rules = [
            'venda_id' => 'required'
        ];

        $messages = [
            'venda_id' => 'Nenhuma venda foi iniciada ainda'
        ];

        $validator = \Validator::make($data, $rules, $messages);

        if($validator->errors()->isEmpty()) {
            $venda = Venda::find($data['venda_id']);

            $pagamentos = $venda->pagamentos;
            $vales = $venda->vales;

            if (count($pagamentos) < 1 && count($vales) < 1 ) {
                $data['pagamentos'] = '';
            }

            $somaPagamento = 0;
            foreach ($pagamentos as $pagamento) {
                $somaPagamento += $pagamento->valor;
            }
            foreach ($vales as $vale) {
                $somaPagamento += $vale->valor;
            }
            if ($somaPagamento != $venda->totalliq) {
                $validator->errors()->add('pagamentos', 'Soma dos pagamentos e (ou) vales é diferente do valor da venda');
            }
        }

        if(!$validator->errors()->isEmpty()) {
            throw new ValidationException($validator, "Erro na revisao da venda");
        }
        return $validator;
    }

}
