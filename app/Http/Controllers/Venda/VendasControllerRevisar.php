<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Venda;
use App\Validator\RevisaoValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendasControllerRevisar extends Controller
{
    public function revisar(Request $request) {
        try {
            $dados = $request->all();
            $vendaId = $request->session()->get('venda_id');
            $dados['venda_id'] = $vendaId;

            RevisaoValidator::validate($dados);
            $venda = Venda::find($vendaId);
            if(!$venda) {
                return redirect()->route('itens');
            }
            date_default_timezone_set('America/Recife');
            $venda->dtvenda = date("Y-m-d");
            $venda->hrvenda = date("H:i:s");

            $cliente = Cliente::find($request->cliente);
            $venda->cliente()->associate($cliente);

            $venda->desconto = (1 - ($request->desconto / 100));
            $venda->atualizarValores();

            return view("venda.vendas_revisao", [
                'venda' => $venda,
                'itens' => $venda->vendaItens,
                'cliente'=>$cliente,
                'usuario' => Auth::user(),
                'pagamentos' => $venda->pagamentos]);

        } catch (ValidationException $exception) {
            return redirect()->route('pagamento')
                ->withErrors($exception->getValidator())
                ->withInput();
        }
    }
}
