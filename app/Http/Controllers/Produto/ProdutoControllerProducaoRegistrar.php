<?php

namespace App\Http\Controllers\Produto;

use App\Exceptions\ObjetoNaoEcontradoException;
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
                $produto->addMovEstoque(1, 1, $request['quantidade'], $request['dtproducao'], Auth::id());
                return redirect()->back();
            } else {
                throw new ObjetoNaoEcontradoException('Objeto ['.gettype($produto).']=>'.$id.' não encontrado no banco de dados.');
            }

        } catch (Exception $exception) {
            return redirect()
                ->back()
                ->withErrors(['producao' => $exception->getMessage()])
                ->withInput();
        }
    }
}
