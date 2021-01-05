<?php

namespace App\Validator;

use App\Exceptions\CustomValidationException;

class SalvarComposicaoValidator
{
    public static function validate($dados) {
        $erros = [];

        if (Session()->has('itens')) {
            $itens = Session()->get('itens');
            if($itens[0]['produto']->id != $dados['produto']) {
                $erros['produto'] = 'Os itens presentes na sessão não pertencem ao produto atual.';
            }
        } else {
            $erros['composicao'] = 'Nenhuma composicao foi iniciada ainda.';
        }

        if (count($erros) > 0) {
            throw new CustomValidationException($erros, "Erro na validação do salvamento da composição");
        }
        return $erros;
    }
}
