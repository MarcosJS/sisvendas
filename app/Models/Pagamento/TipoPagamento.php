<?php

namespace App\Models\Pagamento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPagamento extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public static $rules = [
        'nome' => 'required|max:30'
    ];

    public static $messages = [
        'nome.required' => 'O nome do tipo é obrigatório',
        'nome.max' => 'O nome do tipo deve ter apenas 30 caracteres'
    ];

    public function pagamento() {
        return $this->hasMany('App\Models\Pagamento\Pagamento');
    }
}
