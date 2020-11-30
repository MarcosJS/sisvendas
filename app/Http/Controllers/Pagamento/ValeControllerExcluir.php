<?php

namespace App\Http\Controllers\Pagamento;

use App\Http\Controllers\Controller;
use App\Models\Pagamento\Vale;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ValeControllerExcluir extends Controller
{
    public function excluir($id) {
        $vale = Vale::find($id);
        try {
            if ($vale != null) {
                $vale->delete();
                return redirect()->back();
            } else {
                throw ValidationException::withMessages(['vale' => 'O Vale não existe']);
            }
        } catch (ValidationException $exception) {
            return redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }
}
