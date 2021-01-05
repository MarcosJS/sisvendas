<?php

namespace App\Http\Controllers\Produto\Composicao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComposicaoControllerLimpar extends Controller
{
    public function limpar () {
        if (Session()->has('itens')) {
            Session()->forget('itens');
            return redirect()->back();
        } else {
            return redirect()
                ->back()
                ->withErrors(['composicao' => 'Nenhuma composicao foi iniciada ainda.']);
        }
    }
}
