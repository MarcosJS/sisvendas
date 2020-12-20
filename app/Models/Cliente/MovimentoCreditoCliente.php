<?php

namespace App\Models\Cliente;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimentoCreditoCliente extends Model
{
    use HasFactory;

    protected $fillable = ['valor', 'dt_movimento', 'hr_movimento', 'observacao'];

    public function tipoMovCredCliente() {
        return $this->belongsTo('App\Models\Cliente\TipoMovCredCliente');
    }

    public function catMovCredCliente() {
        return $this->belongsTo('App\Models\Cliente\CatMovCredCliente');
    }

    public function cliente() {
        return $this->belongsTo('App\Models\Cliente\Cliente');
    }

    public function venda() {
        return $this->belongsTo('App\Models\Venda');
    }


}
