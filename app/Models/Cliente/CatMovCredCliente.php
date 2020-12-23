<?php

namespace App\Models\Cliente;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatMovCredCliente extends Model
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

    public function movimentoCreditoCliente() {
        return $this->hasMany('App\Models\Cliente\MovimentoCreditoCliente');
    }
}

