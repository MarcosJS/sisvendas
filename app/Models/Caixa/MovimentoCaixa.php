<?php

namespace App\Models\Caixa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimentoCaixa extends Model
{
    use HasFactory;

    protected $fillable = ['valor', 'dt_movimento'];

    public function tipoMovCaixa() {
        return $this->belongsTo('App\Models\Caixa\TipoMovCaixa');
    }

    public function catMovCaixa() {
        return $this->belongsTo('App\Models\Caixa\CatMovCaixa');
    }

    public function turno() {
        return $this->belongsTo('App\Models\Caixa\Turno');
    }

    public function usuario() {
        return $this->belongsTo('App\Models\Usuario');
    }

    public function recebimento() {
        return $this->belongsTo('App\Models\Pagamento\Pagamento');
    }
}
