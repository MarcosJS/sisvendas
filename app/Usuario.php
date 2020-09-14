<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'nome', 'email', 'senha', 'cpf', 'matricula', 'status', 'funcao'
    ];

    public function vendas() {
        return $this->hasMany('App\Venda');
    }
}
