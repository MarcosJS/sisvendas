<?php

namespace App\Http\Controllers\Caixa;

use App\Http\Controllers\Controller;
use App\Models\Pagamento\Vale;
use App\Validator\QuitarValeValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;

class CaixaControllerQuitarVale extends Controller
{
    public function quitar ($id) {
        try {
            $dado['vale'] = $id;
            QuitarValeValidator::validate($dado);

            $vale = Vale::find($id);
            foreach ($vale->pagamentos as $pagamento) {
                $pagamento->concluir(Session()->get('sistema')->caixa());
            }

            date_default_timezone_set('America/Recife');
            $vale['dtquitacao'] = date("Y-m-d");
            $vale->save();

            return redirect()->route('contasareceber');

        } catch (ValidationException $exception) {
            return redirect()
                ->back()
                ->withErrors($exception->getValidator());
        } catch (\Exception $exception) {
            return redirect()
                ->back()
                ->withErrors(['erro' => $exception->getMessage()]);
        }
    }
}
