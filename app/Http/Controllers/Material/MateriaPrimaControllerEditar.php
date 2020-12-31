<?php

namespace App\Http\Controllers\Material;

use App\Http\Controllers\Controller;
use App\Models\MateriaPrima\MateriaPrima;
use Illuminate\Http\Request;

class MateriaPrimaControllerEditar extends Controller
{
    public function editar($id) {
        $material = MateriaPrima::find($id);
        if($material) {
            return view('material.material_editar', ['material' => $material]);
        } else {
            return redirect()->back();
        }
    }
}
