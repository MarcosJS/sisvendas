<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendaItem extends Model
{

    protected $fillable = [
        'qtd', 'precofinal', 'subtotal'
    ];

    public function produto() {
        return $this->belongsTo('App\Produto');
    }

    public function venda() {
        return $this->belongsTo('App\Venda');
    }
}
