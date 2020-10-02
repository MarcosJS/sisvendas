<?php

namespace App\Models\Pagamento;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class PagamentoCheque extends Pagamento
{
    use HasFactory;

    protected $table = 'pagamentos';

    public function __construct()
    {
        $this->tipo = 'CHEQUE';
    }

    public function cheque() {
        return $this->hasOne('App\Models\Pagamento\Cheque', 'pagamento_id');
    }
}
