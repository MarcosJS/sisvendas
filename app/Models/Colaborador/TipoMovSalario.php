<?php

namespace App\Models\Colaborador;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMovSalario extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public static $rules = [
        'nome' => 'required|max:20'
    ];

    public static $messages = [
        'nome.required' => 'O nome do tipo é obrigatório',
        'nome.max' => 'O nome do tipo deve ter apenas 20 caracteres'
    ];

    public function movimentoSalario() {
        return $this->hasMany('App\Models\Colaborador\MovimentoSalario');
    }
}
