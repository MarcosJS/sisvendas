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

    public function pagamento() {
        return $this->hasOne('App\Models\Pagamento\Pagamento');
    }
}
