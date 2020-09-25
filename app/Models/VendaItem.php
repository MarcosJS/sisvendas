<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendaItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'qtd', 'precofinal', 'subtotal'
    ];

    public function produto() {
        return $this->belongsTo('App\Models\Produto');
    }

    public function venda() {
        return $this->belongsTo('App\Models\Venda');
    }
}
