<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteControllerNovo extends Controller
{
    public function novo() {
        return view("cliente_novo");
    }
}
