<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome', 'descricao', 'estoque', 'preco'
    ];

    public function vendaItens() {
        return $this->$this->belongsToMany('App\VendaItem', 'produto_vendaitem');
    }
}
