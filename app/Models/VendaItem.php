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

    public static $rules = [
        'qtd' => 'required|integer|min:0',
        'precofinal' => 'required|numeric|min:0',
        'subtotal' => 'required|numeric|min:0'
    ];

    public static $messages = [
        'qtd.required' => 'O campo quantidade é obrigatório',
        'qtd.integer' => 'A quantidade deve ser é um numero inteiro',
        'qtd.min' => 'A quantidade deve ser maior que 0 (zero)',
        'precofinal.required' => 'O campo preço final é obrigatório',
        'precofinal.numeric' => 'O campo preço final deve ser do tipo numerico',
        'precofinal.min' => 'O preço final deve ser maior que 0 (zero)',
        'subtotal.required' => 'O campo subtotal é obrigatório',
        'subtotal.numeric' => 'O subtotal deve ser do tipo numerico',
        'subtotal.min' => 'O subtotal deve ser maior que 0 (zero)'
    ];

    public function produto() {
        return $this->belongsTo('App\Models\Produto');
    }

    public function venda() {
        return $this->belongsTo('App\Models\Venda');
    }
}
