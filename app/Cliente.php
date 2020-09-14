<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nome', 'datanasc', 'cpf', 'modcredito', 'status'
    ];

    public function endereco() {
        return $this->hasOne('App\Endereco');
    }

    public function telefone() {
        return $this->hasMany('App\Telefone');
    }

    public function compras() {
        return $this->hasMany('App\Venda');
    }
}
