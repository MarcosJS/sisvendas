<?php

namespace App\Models\Produto;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemComposicao extends Model
{
    use HasFactory;

    protected $fillable     = [
        'quantidade'
    ];

    public static $rules = [
        'quantidade' => 'required|integer|min:0'
    ];

    public static $messages = [
        'quantidade.required' => 'O campo quantidade é obrigatório',
        'quantidade.integer' => 'A quantidade deve ser é um numero inteiro',
        'quantidade.min' => 'A quantidade deve ser maior que 0 (zero)'
    ];

    public function materiaPrima() {
        return $this->belongsTo('App\Models\MateriaPrima\MateriaPrima');
    }

    public function composicao() {
        return $this->belongsTo('App\Models\Produto\Composicao');
    }
}
