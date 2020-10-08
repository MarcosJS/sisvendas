<?php

namespace App\Models\Pagamento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emitente extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo', 'inscricao', 'nome'
    ];

    public static $rules = [
        'tipo' => 'required|max:20',
        'inscricao' => 'required|max:14',
        'nome'=>'required|min:5|max:100'
    ];

    public static $messages = [
        'tipo.required' => 'O campo tipo é obrigatório',
        'tipo.max' => 'O tipo deve ter no máximo 20 letras',
        'inscricao.required'=>'O campo inscrição é obrigatório',
        'inscricao.size'=>'A inscrição deve ter entre 11  e 14 digitos',
        'nome.required'=>'O campo nome é obrigatório',
        'nome.min'=>'O nome deve ter no mínimo 5 letras',
        'nome.max'=>'O nome deve ter no máximo 100 letras',
    ];

    public function cheque() {
        return $this->belongsTo('App\Models\Pagamento\Cheque');
    }
}
