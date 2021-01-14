<?php

namespace App\Http\Controllers\Caixa;

use App\Http\Controllers\Controller;
use App\Models\Caixa\Caixa;
use Illuminate\Http\Request;

class CaixaControllerAbrir extends Controller
{
    public function abrir() {
        try {
            $erro = null;
            $caixa = Session()->get('sistema')->caixa();
            if ($caixa != null) {
                if(!$caixa->aberto()) {
                    $caixa->abrir();
                    return redirect()->back();
                }
                $erro = ['abrir' => 'O caixa já esta aberto'];
            } else {
                $erro = ['abrir' => 'O caixa não foi inicializado no banco de dados'];
            }

            return redirect()
                ->back()
                ->withErrors($erro);
        } catch (\Exception $exception) {
            redirect()
                ->back()
                ->withErrors(['erro' =>$exception->getMessage()]);
        }
    }
}
