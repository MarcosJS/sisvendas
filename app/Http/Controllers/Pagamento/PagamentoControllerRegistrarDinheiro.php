<?php

namespace App\Http\Controllers\Pagamento;

use App\Exceptions\OCaixaNaoFoiInicializadoException;
use App\Exceptions\OperacaoNaoPermitidaParaCaixaFechadoException;
use App\Http\Controllers\Controller;
use App\Models\Caixa\Caixa;
use App\Models\Pagamento\Pagamento;
use App\Models\Pagamento\Vale;
use App\Models\Venda;
use Illuminate\Http\Request;

class PagamentoControllerRegistrarDinheiro extends Controller
{
    public function registrar(Request $request) {
        if (Session()->has('venda_id') || $request['vale'] != null) {
            try {
                $pagamento = new Pagamento();
                $pagamento['valor'] = $request['dinheiro'];
                date_default_timezone_set('America/Recife');
                $pagamento['dtpagamento'] = date("Y-m-d");
                $pagamento->tipoPagamento()->associate(1);

                if (Session()->has('venda_id')) {
                    $venda = Venda::find(Session()->get('venda_id'));
                    $pagamento->venda()->associate($venda);
                } else {
                    $pagamento->vale()->associate($request['vale']);
                }


                $pagamento->save();

                return redirect()->back();
            } catch (OCaixaNaoFoiInicializadoException $exception) {
                $erro = ['caixa' => $exception->getMessage()];
            } catch (OperacaoNaoPermitidaParaCaixaFechadoException $exception) {
                $erro = ['caixa' => $exception->getMessage()];
            } catch (\Exception $exception) {
                $erro = ['caixa' => "Falha no sistema contate o administrador".$exception->getMessage()];
            }
        } else {
            $erro = ['venda_id' => 'Nenhuma venda ou vale foi informado!'];
        }
        return redirect()
            ->back()
            ->withErrors($erro);
    }
}
