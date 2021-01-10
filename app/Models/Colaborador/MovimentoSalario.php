<?php

namespace App\Models\Colaborador;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimentoSalario extends Model
{
    use HasFactory;

    protected $fillable = ['valor', 'dtmovimento', 'observacao'];

    public static $rules = ['observacao' => 'nullable|max:255'];

    public static $messages = ['observacao.max' => 'O campo observações deve ter no máximo 255 caracteres'];

    public function tipoMovSalario() {
        return $this->belongsTo('App\Models\Colaborador\TipoMovSalario');
    }

    public function catMovSalario() {
        return $this->belongsTo('App\Models\Colaborador\CatMovSalario');
    }

    public function competencia() {
        return $this->belongsTo('App\Models\Competencia');
    }

    public function colaborador() {
        return $this->belongsTo('App\Models\Colaborador\Colaborador');
    }

    public function movimentoCaixa() {
        return $this->hasOne('App\Models\Caixa\MovimentoCaixa');
    }
}
