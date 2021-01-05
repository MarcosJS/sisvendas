<?php

namespace App\Models\MateriaPrima;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimentoEstoqueMat extends Model
{
    use HasFactory;

    protected $fillable     = [
        'quantidade', 'dtmovimento', 'observacao'
    ];

    public static $rules = [
        'quantidade' => 'required|integer|min:0',
        'dtmovimento' => 'required|date',
        'observacao' => 'nullable|max:255'
    ];

    public static $messages = [
        'quantidade.required' => 'O campo quantidade é obrigatório',
        'quantidade.integer' => 'A quantidade deve ser é um numero inteiro',
        'quantidade.min' => 'A quantidade deve ser maior que 0 (zero)',
        'dtmovimento.required' => 'O campo data é obrigatório',
        'dtmovimento.date' => 'Este campo deve ser do tipo data',
        'observacao.max' => 'O campo observações deve ter no máximo 255 caracteres'
    ];

    public function tipoMovEstoqueMat() {
        return $this->belongsTo('App\Models\MateriaPrima\TipoMovEstoqueMat');
    }

    public function catMovEstoqueMat() {
        return $this->belongsTo('App\Models\MateriaPrima\CatMovEstoqueMat');
    }

    public function materiaPrima() {
        return $this->belongsTo('App\Models\MateriaPrima\MateriaPrima');
    }

    public function usuario() {
        return $this->belongsTo('App\Models\Usuario');
    }
}
