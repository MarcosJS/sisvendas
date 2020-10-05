<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcao extends Model
{
    use HasFactory;

    protected $fillable = ['nomefuncao', 'nivel'];

    public static $rules = [
        'nomefuncao' => 'required|unique:App\Models\Funcao|max:50',
        'nivel' => 'required|integer'
    ];

    public static $messages = [
        'nomefuncao.required' => 'O campo função é obrigatório',
        'nomefuncao.unique' => 'Esta função já esta cadastrada',
        'nomefuncao.max' => 'O nome da função deve ter no máximo 50 letras',
        'nivel.required' => 'O campo nível é obrigatório',
        'nivel.integer' => 'O nível deve ser é um numero inteiro',
    ];

    public function usuarios() {
        return $this->hasMany('App\Models\Usuario');
    }
}
