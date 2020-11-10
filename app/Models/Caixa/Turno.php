<?php

namespace App\Models\Caixa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    use HasFactory;

    protected $fillable = ['abertura', 'fechamento'];

    public function movimentos() {
        return $this->hasMany('App\Models\Caixa\MovimentoCaixa');
    }

    public function usuario() {
        return $this->belongsTo('App\Models\Usuario');
    }

    public function statusTurno() {
        return $this->belongsTo('App\Models\Caixa\StatusTurno');
    }

    public function caixa() {
        return $this->belongsTo('App\Models\Caixa\Caixa');
    }
}
