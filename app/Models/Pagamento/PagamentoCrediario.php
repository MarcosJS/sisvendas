<?php

namespace App\Models\Pagamento;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class PagamentoCrediario extends Pagamento
{
    use HasFactory;


    public function __construct()
    {
        $this->tipo = 'CREDIARIO';
    }
}
