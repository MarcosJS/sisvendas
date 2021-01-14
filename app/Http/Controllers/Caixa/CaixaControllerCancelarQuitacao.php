<?php

namespace App\Http\Controllers\Caixa;

use App\Http\Controllers\Controller;
use App\Models\Pagamento\Vale;
use Illuminate\Http\Request;

class CaixaControllerCancelarQuitacao extends Controller
{
    public function cancelar ($id) {
        try {
            $vale = Vale::find($id);
            foreach ($vale->pagamentos as $pagamento) {
                $pagamento->delete();
            }
            return redirect()->route('contasareceber');
        } catch (\Exception $exception) {
            return redirect()
                ->back()
                ->withErrors(['erro' => $exception->getMessage()]);
        }
    }
}
