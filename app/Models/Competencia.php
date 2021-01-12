<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero', 'exercicio', 'dtabertura', 'dtfechamento'
    ];

    public function movimentoSalarios() {
        return $this->hasMany('App\Models\Colaborador\MovimentoSalario');
    }
}
