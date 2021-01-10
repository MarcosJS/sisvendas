<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    use HasFactory;

    protected $fillable = [
        'numerotel'
    ];

    public static $rules = [
        'numerotel' => 'nullable|size:11'
    ];

    public static $messages = [
        'numerotel.size' => 'O telefone deve ter apenas 11 digitos'
    ];

    public function cliente() {
        return $this->belongsTo('App\Models\Cliente\Cliente');
    }

    public function colaborador() {
        return $this->belongsTo('App\Models\Colaborador\Colaborador');
    }
}
