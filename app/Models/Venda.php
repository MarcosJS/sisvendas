<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = [
        'dtvenda', 'hrvenda', 'totalprodutos', 'desconto', 'totalliq'
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

    public function statusVenda() {
        return $this->belongsTo('App\Models\StatusVenda');
    }

    public function pagamentos() {
        return $this->hasMany('App\Models\Pagamento\Pagamento');
    }

    public function atualizarValores()
    {
        if($this->vendaItens()){
            $this->totalprodutos = $this->vendaItens()->sum('subtotal');
            if($this->desconto === null) {
                $this->desconto = 1;
            }
            $this->totalliq = $this->totalprodutos * $this->desconto;
            $this->save();
        }
    }

    public function descPorcent() {
        return (1 - $this->desconto) * 100;
    }
}
