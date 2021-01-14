<?php

namespace App\Http\Controllers\Caixa;

use App\Http\Controllers\Controller;
use App\Models\Caixa\Caixa;
use Illuminate\Http\Request;

class CaixaControllerFechar extends Controller
{
    public function fechar() {
        try {
            $erro = null;
            $caixa = Session()->get('sistema')->caixa();
            if ($caixa != null) {
                if ($caixa->aberto()) {
                    $caixa->fechar();
                    return redirect()->back();
                }
                $erro = ['fechar' => 'O caixa já esta fechado'];
            } else {
                $erro = ['fechar' => 'O caixa não foi inicializado no banco de dados'];
            }

            return redirect()
                ->back()
                ->withErrors($erro);
        } catch (\Exception $exception) {
            return redirect()
                ->back()
                ->withErrors(['erro' => $exception->getMessage()]);
        }
    }
}
