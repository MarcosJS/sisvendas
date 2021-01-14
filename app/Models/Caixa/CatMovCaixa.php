<?php

namespace App\Models\Caixa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatMovCaixa extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public static $rules = [
        'nome' => 'required|max:20'
    ];

    public static $messages = [
        'nome.required' => 'O nome da categoria é obrigatório',
        'nome.max' => 'O nome da categoria deve ter apenas 20 caracteres'
    ];

    public function movimentoCaixa() {
        return $this->hasMany('App\Models\Caixa\MovimentoCaixa');
    }

    public function tipoMovCaixa() {
        return $this->belongsTo('App\Models\Caixa\TipoMovCaixa');
    }
}
