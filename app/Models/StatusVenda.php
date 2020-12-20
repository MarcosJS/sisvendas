<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusVenda extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public static $rules = [
        'nome' => 'required|max:20'
    ];

    public static $messages = [
        'nome.required' => 'O nome do status é obrigatório',
        'nome.max' => 'O nome do status deve ter apenas 20 caracteres'
    ];

    public function vendas() {
        return $this->hasMany('App\Models\Venda');
    }
}
