<?php

namespace App\Models\Caixa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusTurno extends Model
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

    public function turno() {
        return $this->hasMany('App\Models\Caixa\Turno');
    }
}
