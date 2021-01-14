<?php

namespace App\Http\Controllers\Pagamento;

use App\Exceptions\OCaixaNaoFoiInicializadoException;
use App\Exceptions\OperacaoNaoPermitidaParaCaixaFechadoException;
use App\Http\Controllers\Controller;
use App\Models\Caixa\Caixa;
use App\Models\Pagamento\Pagamento;
use App\Models\Venda;
use Illuminate\Http\Request;

class PagamentoControllerRegistrarDinheiro extends Controller
{
    public function registrar(Request $request) {
        $erro = [];
        if (Session()->has('venda_id')) {
            try {
                $venda = Venda::find(Session()->get('venda_id'));

                $pagamento = new Pagamento();
                //$pagamento->tipo = 'DINHEIRO';
                $pagamento->valor = $request['dinheiro'];
                date_default_timezone_set('America/Recife');
                $pagamento->dtpagamento = date("Y-m-d");
                $pagamento->tipoPagamento()->associate(1);
                $pagamento->venda()->associate($venda);
                $pagamento->save();
                //$caixa = Session()->get('sistema')->caixa();
                //$pagamento->concluir($caixa);

                return redirect()->back();
            } catch (OCaixaNaoFoiInicializadoException $exception) {
                $erro = ['caixa' => $exception->getMessage()];
            } catch (OperacaoNaoPermitidaParaCaixaFechadoException $exception) {
                $erro = ['caixa' => $exception->getMessage()];
            } catch (\Exception $exception) {
                $erro = ['caixa' => "Falha no sistema contate o administrador".$exception->getMessage()];
            }
        } else {
            $erro = ['venda_id' => 'Nenhuma venda foi iniciada ainda!'];
        }
        return redirect()
            ->back()
            ->withErrors($erro);
    }
}
