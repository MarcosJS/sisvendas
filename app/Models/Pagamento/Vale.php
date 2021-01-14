<?php

namespace App\Models\Pagamento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vale extends Model
{
    use HasFactory;

    protected $fillable = [
        'valor', 'dtlancamento', 'dtvencimento', 'dtquitacao'
    ];

    public function venda() {
        return $this->belongsTo('App\Models\Venda');
    }

    public function pagamentos() {
        return $this->hasMany('App\Models\Pagamento\Pagamento');
    }

    public function cliente () {
        return $this->belongsTo('App\Models\Cliente\Cliente');
    }
}
