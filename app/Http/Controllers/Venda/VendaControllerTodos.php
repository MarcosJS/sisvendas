<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendaControllerTodos extends Controller
{
    public function obterTodos(Request $request) {
        try {
            $vendas = Venda::all()->sortBy('id');

            return view('venda.vendas', [
                'success' => $request['success'],
                'vendas' => $vendas]);
        } catch (\Exception $exception) {
            return redirect()
                ->back()
                ->withErrors(['erro' => $exception->getMessage()]);
        }

    }
}
