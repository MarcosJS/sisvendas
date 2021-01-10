<?php

namespace App\Http\Controllers\Produto;

use App\Exceptions\ComposicaoNaoLocalizadaException;
use App\Exceptions\ObjetoNaoEncontradoException;
use App\Http\Controllers\Controller;
use App\Models\Produto\Produto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdutoControllerProducaoRegistrar extends Controller
{
    public function registrar(Request $request, $id) {

        try{
            $produto = Produto::find($id);

            if($produto != null)
            {
                date_default_timezone_set('America/Recife');
                $data = date("Y-m-d");
                if ($request['dtmovimento'] != null) {
                    $data = $request['dtmovimento'];
                }

                if ($request['categoria'] == 1) {
                    $composicao = $produto->composicao();
                    if ($composicao != null) {
                        foreach ($composicao->itensComposicao as $item) {
                            $material = $item->materiaPrima;
                            $material->addMovEstoqueMat(2, 4, $item->quantidade * $request['quantidade'], $data, Auth::id());
                        }
                    } else {
                        throw new ComposicaoNaoLocalizadaException('O Produto não possui composicao para essa origem de entrada. Selecione outra opção');
                    }
                }

                $produto->addMovEstoque(1, $request['categoria'], $request['quantidade'], $data, Auth::id());
                return redirect()->back();
            } else {
                throw new ObjetoNaoEncontradoException('Objeto ['.gettype($produto).']=>'.$id.' não encontrado no banco de dados.');
            }

        } catch (Exception $exception) {
            return redirect()
                ->back()
                ->withErrors(['producao' => $exception->getMessage()])
                ->withInput();
        }
    }
}
