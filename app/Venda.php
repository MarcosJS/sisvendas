<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $fillable = [
        'dtvenda', 'hrvenda', 'totalprodutos', 'desconto', 'totalliq', 'dtpagamento', 'metodopg', 'status'
    ];

    public function vendaItens() {
        return $this->hasMany('App\VendaItem');
    }
}
