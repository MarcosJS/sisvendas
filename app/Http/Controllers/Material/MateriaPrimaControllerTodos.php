<?php

namespace App\Http\Controllers\Material;

use App\Http\Controllers\Controller;
use App\Models\MateriaPrima\MateriaPrima;
use Illuminate\Http\Request;

class MateriaPrimaControllerTodos extends Controller
{
    public function obterTodos() {
        $materiais = MateriaPrima::all()->sortBy('nome');
        return view('material.materiais', ['materiais' => $materiais]);
    }
}
