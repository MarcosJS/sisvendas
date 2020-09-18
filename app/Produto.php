<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome', 'descricao', 'estoque', 'preco'
    ];

    public function vendaItens() {
        return $this->belongsToMany('App\VendaItem', 'produto_venda_item',
                        'produto_id', 'venda_item_id')->withTimestamps();
    }
}
