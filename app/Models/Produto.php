<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Produto extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable     = [
        'nome', 'descricao', 'estoque', 'preco'
    ];

    public static $rules = [
        'nome' => 'required|min:2|max:50',
        'descricao' => 'max:100',
        'estoque' => 'required|integer|min:0',
        'preco' => 'required|numeric|min:0'
    ];

    public static $messages = [
        'nome.required' => 'O campo nome é obrigatório',
        'nome.min' => 'O nome deve ter no mínimo 2 letras',
        'nome.max' => 'O nome deve ter no máximo 100 letras',
        'descricao.*' => 'A descrição deve ter no máximo 100 letras',
        'estoque.required' => 'O campo estoque é obrigatório',
        'estoque.integer' => 'O estoque deve ser é um numero inteiro',
        'estoque.min' => 'O estoque deve ser maior que 0 (zero)',
        'preco.required' => 'O campo preço é obrigatório',
        'preco.numeric' => 'O campo preço deve ser do  tipo numerico',
        'preco.min' => 'O preço deve ser maior que 0 (zero)'
    ];

    public function vendaItens() {
        return $this->hasMany('App\Models\VendaItem');
    }
}
