<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendaItem extends Model
{

    protected $fillable = [
        'qtd', 'precofinal', 'subtotal'
    ];

    public function produtos() {
        return $this->belongsToMany('App\Produto', 'produto_venda_item',
            'venda_item_id', 'produto_id')->withTimestamps();
    }
}
