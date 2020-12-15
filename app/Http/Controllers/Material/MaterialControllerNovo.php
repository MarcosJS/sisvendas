<?php

namespace App\Http\Controllers\Material;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MaterialControllerNovo extends Controller
{
    public function novo() {
        return view("material.material_novo");
    }
}
