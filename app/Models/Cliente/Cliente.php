<?php

namespace App\Models\Cliente;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 'datanasc', 'cpf', 'modcredito', 'status'
    ];

    public static $rules = [
        'nome'=>'required|min:5|max:100',
        'datanasc' => 'date',
        'cpf'=>'required|size:11|unique:App\Models\Cliente',
        'modcredito' => 'boolean',
        'status' => 'boolean'
    ];

    public static $messages = [
        'nome.required'=>'O campo nome é obrigatório',
        'nome.min'=>'O nome deve ter no mínimo 5 letras',
        'nome.max'=>'O nome deve ter no máximo 100 letras',
        'datanasc.*'=>'Neste campo deve ser informada uma data',
        'cpf.required'=>'O campo cpf é obrigatório',
        'cpf.size'=>'O cpf deve ter apenas 11 digitos',
        'cpf.unique'=>'Esse numero de cpf já esta cadastrado',
        'modcredito'=>'Este campo é do tipo booleno',
        'status'=>'Este campo é do tipo booleno',
    ];

    public function endereco() {
        return $this->hasOne('App\Models\Endereco');
    }

    public function telefones() {
        return $this->hasMany('App\Models\Telefone');
    }

    public function vendas() {
        return $this->hasMany('App\Models\Venda');
    }

    public function movimentoCreditos() {
        return $this->hasMany('App\Models\Cliente\MovimentoCreditoCliente');
    }

    public function saldoCredito() {
        $saldo = 0;
        foreach ($this->movimentoCreditos as $mov) {
            $saldo += $mov->valor;
        }
        return $saldo;
    }
}
