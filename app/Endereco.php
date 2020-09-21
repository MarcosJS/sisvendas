<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = [
        'logradouro', 'numero', 'bairro', 'cidade', 'cep'
    ];

    public function cliente() {
        return $this->belongsTo('App\Cliente');
    }
}
