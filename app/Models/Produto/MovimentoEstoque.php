<?php

namespace App\Models\Produto;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimentoEstoque extends Model
{
    use HasFactory;

    protected $fillable     = [
        'quantidade', 'dtmovimento'
    ];

    public static $rules = [

        'quantidade' => 'required|integer|min:0',
        'dtproducao' => 'required|date'
    ];

    public static $messages = [
        'quantidade.required' => 'O campo quantidade é obrigatório',
        'quantidade.integer' => 'A quantidade deve ser é um numero inteiro',
        'quantidade.min' => 'A quantidade deve ser maior que 0 (zero)',
        'dtproducao.required' => 'O campo data é obrigatório',
        'dtproducao.date' => 'Este campo deve ser do tipo data'
    ];

    public function tipoMovEstoque() {
        return $this->belongsTo('App\Models\Produto\TipoMovEstoque');
    }

    public function catMovEstoque() {
        return $this->belongsTo('App\Models\Produto\CatMovEstoque');
    }

    public function produto() {
        return $this->belongsTo('App\Models\Produto\Produto');
    }

    public function usuario() {
        return $this->belongsTo('App\Models\Usuario');
    }
}
