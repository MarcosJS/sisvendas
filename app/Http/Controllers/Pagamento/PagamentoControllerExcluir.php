<?php

namespace App\Http\Controllers\Pagamento;

use App\Http\Controllers\Controller;
use App\Models\Pagamento\Pagamento;
use Illuminate\Validation\ValidationException;

class PagamentoControllerExcluir extends Controller
{
    public function excluir($id) {
        $pagamento = Pagamento::find($id);
        try {
            if($pagamento != null) {
                $pagamento->delete();
                return redirect()->back();
            } else {
                throw ValidationException::withMessages(['pagamento' => 'O Pagamento não existe']);
            }
        } catch (ValidationException $exception) {
            return redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }
}
