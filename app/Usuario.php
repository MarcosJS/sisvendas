<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'nome', 'email', 'senha', 'cpf', 'matricula', 'status', 'funcao'
    ];

    public static $rules= [
        'nome'=>'required|min:5|max:100',
        'email'=>'unique:App\usuario,email',
        'senha'=>'required|min:6|confirmed',
        'cpf'=>'required|size:11',
        'matricula'=>'nullable|integer|min:1',
        'funcao'=>'required|min:5|max:100'];

    public static $messages = [
        'nome.required'=>'O campo nome é obrigatório',
        'nome.min'=>'O nome deve ter no mínimo 5 letras',
        'nome.max'=>'O nome deve ter no máximo 100 letras',
        'email.*'=>'Este email já esta cadastrado',
        'senha.required'=>'O campo senha é obrigatório',
        'senha.min'=>'A senha deve ter no mínimo 6 caracteres',
        'senha.confirmed'=>'Senhas não conferem',
        'cpf.required'=>'O campo cpf é obrigatório',
        'cpf.size'=>'O cpf deve ter apenas 11 digitos',
        'matricula.integer'=>'A matrícula deve ser é um numero inteiro',
        'matricula.min'=>'O valor da matricula deve ser maior que 0',
        'funcao.required'=>'O campo função é obrigatório',
        'funcao.min'=>'O nome da função deve ter no mínimo 5 letras',
        'funcao.max'=>'O nome da função deve ter no máximo 100 letras'
    ];

    public function vendas() {
        return $this->hasMany('App\Venda');
    }

    public function funcao() {
        return $this->belongsTo('App\Funcao');
    }
}
