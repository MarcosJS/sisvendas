<?php

namespace App\Models\Pagamento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transferencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'valor', 'banco_origem', 'agencia_origem', 'conta_origem', 'operacao_origem',
        'banco_destino', 'agencia_destino','conta_destino', 'operacao_destino', 'dttransferencia',
        'numcomprovante', 'observacao'
    ];

    public static $rules = [
        'valor' => 'required|numeric|min:0',
        'banco_origem' => 'required|max:32',
        'agencia_origem' => 'required|max:32',
        'conta_origem' => 'required|max:32',
        'operacao_origem' => 'nullable|max:32',
        'banco_destino' => 'required|max:32',
        'agencia_destino' => 'required|max:32',
        'conta_destino' => 'required|max:32',
        'operacao_destino' => 'nullable|max:32',
        'dttransferencia' => 'nullable|max:32',
        'numcomprovante' => 'nullable|max:32',
        'observacao' => 'nullable|max:255'
    ];

    public static $messages = [
        'valor.required' => 'O campo valor é obrigatório',
        'valor.numeric' => 'O campo valor deve ser do  tipo numerico',
        'valor.min' => 'O valor deve ser maior que 0 (zero)',
        'banco_origem.required' => 'O campo banco_origem é obrigatório',
        'banco_origem.max' => 'O numero do banco_origem deve ter no máximo 32 caracteres',
        'agencia_origem.required' => 'O campo agencia_origem é obrigatório',
        'agencia_origem.max' => 'O numero da agencia_origem deve ter no máximo 32 caracteres',
        'conta_origem.required' => 'O campo conta_origem é obrigatório',
        'conta_origem.max' => 'O numero da conta_origem deve ter no máximo 32 caracteres',
        'operacao_origem.required' => 'O campo operacao_origem é obrigatório',
        'operacao_origem.max' => 'O numero da operacao_origem deve ter no máximo 32 caracteres',
        'banco_destino.required' => 'O campo banco_destino é obrigatório',
        'banco_destino.max' => 'O numero do banco_destino deve ter no máximo 32 caracteres',
        'agencia_destino.required' => 'O campo agencia_destino é obrigatório',
        'agencia_destino.max' => 'O numero da agencia_destino deve ter no máximo 32 caracteres',
        'conta_destino.required' => 'O campo conta_destino é obrigatório',
        'conta_destino.max' => 'O numero da conta_destino deve ter no máximo 32 caracteres',
        'operacao_destino.required' => 'O campo operacao_destino é obrigatório',
        'operacao_destino.max' => 'O numero da operacao_destino deve ter no máximo 32 caracteres',
        'dttransferencia.required' => 'O campo data da transferencia é obrigatório',
        'dttransferencia.date' => 'Este campo deve ser do tipo data',
        'observacao.max' => 'O campo observações deve ter no máximo 255 caracteres'
    ];

    public function pagamento() {
        return $this->belongsTo('App\Models\Pagamento\Pagamento');
    }
}
