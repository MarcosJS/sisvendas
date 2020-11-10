<?php

namespace App\Models\Pagamento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo', 'valor', 'dtpagamento'
    ];

    public function venda() {
        return $this->belongsTo('App\Models\Venda');
    }

    public function statuspagamento() {
        return $this->belongsTo('App\Models\Pagamento\StatusPagamento');
    }

    public function cheque() {
        return $this->hasOne('App\Models\Pagamento\Cheque');
    }

}
