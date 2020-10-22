<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producao extends Model
{
    use HasFactory;

    protected $fillable     = [
        'quantidade', 'dtproducao'
    ];

    public static $rules = [
        'quantidade' => 'required|integer|min:0',
        'dtproducao' => 'require|date'
     ];

    public static $messages = [
        'quantidade.required' => 'O campo quantidade é obrigatório',
        'quantidade.integer' => 'A quantidade deve ser é um numero inteiro',
        'quantidade.min' => 'A quantidade deve ser maior que 0 (zero)',
        'dtproducao.require' => 'O campo data é obrigatório',
        'dtproducao.date' => 'Este campo deve ser do tipo data'
    ];

    public function produto() {
        return $this->belongsTo('App\Models\Produto');
    }
}
