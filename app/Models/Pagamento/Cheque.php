<?php

namespace App\Models\Pagamento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cheque extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero', 'valor', 'vencimento', 'emissao',
        'banco', 'agencia', 'portador', 'observacao'
    ];

    public static $rules = [
        'numero' => 'required|max:255|unique:App\Models\Pagamento\Cheque',
        'valor' => 'required|numeric|min:0',
        'vencimento' => 'required|date',
        'emisao' => 'date',
        'banco' => 'required|max:32',
        'agencia' => 'required|max:32',
        'contacorrente' => 'required|max:32',
        'portador' => 'nullable|min:5|max:100',
        'observacao' => 'nullable|max:255'
    ];

    public static $messages = [
        'numero.required' => 'O campo numero é obrigatório',
        'numero.unique' => 'Já existe um cheque cadastrado com este numero',
        'valor.required' => 'O campo valor é obrigatório',
        'valor.numeric' => 'O campo valor deve ser do  tipo numerico',
        'valor.min' => 'O valor deve ser maior que 0 (zero)',
        'vencimento.required' => 'O campo vencimento é obrigatório',
        'vencimento.date' => 'Este campo deve ser do tipo data',
        'emissao.date' => 'Este campo deve ser do tipo data',
        'banco.required' => 'O campo banco é obrigatório',
        'banco.max' => 'O numero do banco deve ter no máximo 32 caracteres',
        'agencia.required' => 'O campo agência é obrigatório',
        'agencia.max' => 'O numero da agencia deve ter no máximo 32 caracteres',
        'portador.min'=>'O nome do portador deve ter no mínimo 5 letras',
        'portador.max'=>'O nome do portador deve ter no máximo 100 letras',
        'observacao.max' => 'O campo observações deve ter no máximo 255 caracteres'
    ];

    public function emitente() {
        return $this->hasOne('App\Models\Pagamento\Emitente');
    }

    public function pagamento() {
        return $this->belongsTo('App\Models\Pagamento\Pagamento');
    }
}
