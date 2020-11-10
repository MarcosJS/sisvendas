<?php

namespace App\Models\Caixa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimentoCaixa extends Model
{
    use HasFactory;

    public function tipoMovEstoque() {
        return $this->belongsTo('App\Models\Caixa\TipoMovCaixa');
    }

    public function catMovEstoque() {
        return $this->belongsTo('App\Models\Caixa\CatMovCaixa');
    }

    public function usuario() {
        return $this->belongsTo('App\Models\Usuario');
    }
}
