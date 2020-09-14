<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendaItem extends Model
{

    protected $fillable = [
        'qtd', 'precofinal', 'subtotal'
    ];

    public function produtos() {
        return $this->$this->belongsToMany('App\Produto', 'produto_vendaitem');
    }
}
