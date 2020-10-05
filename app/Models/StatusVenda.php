<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusVenda extends Model
{
    use HasFactory;

    protected $fillable = ['nomestatus'];

    public static $rules = [
        'nomestatus' => 'required|max:20'
    ];

    public static $messages = [
        'nomestatus.required' => 'O nome do status é obrigatório',
        'nomestatus.max' => 'O nome do status deve ter apenas 20 caracteres'
    ];

    public function vendas() {
        return $this->hasMany('App\Models\Venda');
    }
}
