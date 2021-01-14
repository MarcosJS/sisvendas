<?php

namespace App\Validator;

use App\Models\Pagamento\Vale;

class QuitarValeValidator
{
    public static function validate($data) {
        $rules = [
            'vale' => 'required'
        ];

        $messages = [
            'vale' => 'Nenhuma vale foi iniciado'
        ];

        $validator = \Validator::make($data, $rules, $messages);

        if($validator->errors()->isEmpty()) {
            $vale = Vale::find($data['vale']);

            $pagamentos = $vale->pagamentos;

            if (count($pagamentos) < 1) {
                $validator->errors()->add('pagamentos','Não há nenhuma pagamento cadastrado');
            } else {
                $somaPagamento = 0;

                foreach ($pagamentos as $pagamento) {
                    $somaPagamento += $pagamento->valor;
                }

                $somaPagamento = strval($somaPagamento);
                $valorVale = strval($vale->valor);

                if ($somaPagamento > $valorVale) {
                    $validator->errors()->add('pagamentos', 'Soma dos pagamentos e (ou) vales é maior do que o valor a pagar = '. $valorVale.', soma dos pagamentos = '.$somaPagamento);
                }

                if ($somaPagamento < $valorVale) {
                    $validator->errors()->add('pagamentos', 'Soma dos pagamentos e (ou) vales é menor do que o valor do vale '. $valorVale.' '.gettype($valorVale).' ->soma '.$somaPagamento.' '.gettype($somaPagamento));
                }
            }
        }

        if(!$validator->errors()->isEmpty()) {
            throw new ValidationException($validator, "Erro na quitação do vale");
        }
        return $validator;
    }

}

