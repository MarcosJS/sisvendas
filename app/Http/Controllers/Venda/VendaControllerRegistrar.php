<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use App\Models\Cliente\CatMovCredCliente;
use App\Models\Cliente\MovimentoCreditoCliente;
use App\Models\Cliente\TipoMovCredCliente;
use App\Models\StatusVenda;
use App\Models\Venda;
use App\Validator\FinalizarVendaValidator;
use App\Validator\ValidationException;

class VendaControllerRegistrar extends Controller
{
    public function registrar()
    {
        try {
            FinalizarVendaValidator::validate(['venda_id' => Session()->get('venda_id')]);

            $venda = Venda::find(Session()->get('venda_id'));

            date_default_timezone_set('America/Recife');
            $venda->dtvenda = date("Y-m-d");
            $venda->hrvenda = date("H:i:s");

            if ($venda['creditoaplicado'] > 0) {
                $tipo = TipoMovCredCliente::find(2);
                $categoria  = CatMovCredCliente::find(2);

                $credito = new MovimentoCreditoCliente();

                date_default_timezone_set('America/Recife');
                $credito['valor'] = -$venda['creditoaplicado'];
                $credito['dt_movimento'] = date('Y-m-d');
                $credito['hr_movimento'] = date('H:i:s');

                $credito->tipoMovCredCliente()->associate($tipo);
                $credito->catMovCredCliente()->associate($categoria);
                $credito->cliente()->associate($venda->cliente);
                $credito->venda()->associate($venda);

                $credito->save();
            }

            /*Consolidando pagamentos*/
            $pagamentos = $venda->pagamentos;
            $caixa = Session()->get('sistema')->caixa();
            foreach ($pagamentos as $pagamento) {
                $pagamento->concluir($caixa);
            }

            /*Alterando o status da venda e apagando a sessao*/
            $status = StatusVenda::find(2);
            $venda->statusVenda()->associate($status);
            $venda->save();
            Session()->forget('venda_id');

            return redirect()
                ->route('listavendas')
                ->with(['success' => 'Venda finalizada com sucesso!', 'venda_id' => $venda->id]);

        } catch (ValidationException $exception) {
            return redirect()
                ->back()
                ->withErrors($exception->getValidator())
                ->withInput();
        } catch (\Exception $exception) {
            return redirect()
                ->back()
                ->withErrors(['erro' => $exception->getMessage()])
                ->withInput();
        }
    }
}
