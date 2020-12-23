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
            $credito = 0;
            foreach ($pagamentos as $pagamento) {
                $somaPagamento += $pagamento->valor;
            }
            foreach ($vales as $vale) {
                $somaPagamento += $vale->valor;
            }

            if ($venda->creditoGerado != null) {
                $credito = $venda->creditoGerado->valor;
            }

            $somaPagamento -= $credito;
            $somaPagamento = strval($somaPagamento);
            $valorVenda = strval($venda->totalliq);

            if ($somaPagamento > $valorVenda) {
                $validator->errors()->add('pagamentos_maior', 'Soma dos pagamentos e (ou) vales é maior do que o valor a pagar = '. $valorVenda.', soma dos pagamentos = '.$somaPagamento);
                $excedente = $somaPagamento - $valorVenda;
                Session()->put('excedente', $excedente);
            }

            if ($somaPagamento < $valorVenda) {
                $validator->errors()->add('pagamentos', 'Soma dos pagamentos e (ou) vales é menor do que o valor da venda '. $valorVenda.' '.gettype($valorVenda).' ->soma '.$somaPagamento.' '.gettype($somaPagamento));
            }

            if ($venda->cliente == null && $venda->nomecliente == null) {
                $validator->errors()->add('cliente_id', 'Nenhuma informação de cliente foi vinculada a venda');
            }
        }

        if(!$validator->errors()->isEmpty()) {
            throw new ValidationException($validator, "Erro na revisao da venda");
        }
        return $validator;
    }

}
