<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClienteControllerNovo extends Controller
{
    public function novo() {
        return view("clientes.cliente_novo");
    }
}
