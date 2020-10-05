<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = [
        'logradouro', 'numero', 'bairro', 'cidade', 'cep'
    ];

    public static $rules = [
        'logradouro' => 'required|min:5|max:100',
        'numero' => 'integer',
        'bairro' => 'required|min:5|max:100',
        'cidade' => 'required|min:5|max:100',
        'cep' => 'size:11'
    ];

    public static $messages = [
        'logradouro.required'=>'O campo logradouro é obrigatório',
        'logradouro.min'=>'O nome do logradouro deve ter no mínimo 5 letras',
        'logradouro.max'=>'O nome do logradouro deve ter no máximo 100 letras',
        'numero.*' => 'O campo numero deve ser é um numero inteiro',
        'bairro.required'=>'O campo bairro é obrigatório',
        'bairro.min'=>'O nome do bairro deve ter no mínimo 5 letras',
        'bairro.max'=>'O nome do bairro deve ter no máximo 100 letras',
        'cidade.required'=>'O campo cidade é obrigatório',
        'cidade.min'=>'O nome da cidade deve ter no mínimo 5 letras',
        'cidade.max'=>'O nome da cidade deve ter no máximo 100 letras',
        'cep.*'=>'O cep deve ter apenas 11 digitos',
    ];

    public function cliente() {
        return $this->belongsTo('App\Models\Cliente');
    }
}
