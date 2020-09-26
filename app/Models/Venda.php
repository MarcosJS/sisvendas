<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = [
        'dtvenda', 'hrvenda', 'totalprodutos', 'desconto', 'totalliq', 'dtpagamento'
    ];

    public function vendaItens() {
        return $this->hasMany('App\Models\VendaItem');
    }

    public function usuario() {
        return $this->belongsTo('App\Models\Usuario');
    }

    public function cliente() {
        return $this->belongsTo('App\Models\Cliente');
    }

    public function status() {
        return $this->belongsTo('App\Models\StatusVenda');
    }

    public function metodoPagamento() {
        return $this->belongsTo('App\Models\MetodoPagamento');
    }

    public function statusPagamento() {
        return $this->belongsTo('App\Models\StatusPagamento');
    }

    public function atualizarValores()
    {
        if($this->vendaItens()){
            $this->totalprodutos = $this->vendaItens()->sum('subtotal');
        }
    }
}
