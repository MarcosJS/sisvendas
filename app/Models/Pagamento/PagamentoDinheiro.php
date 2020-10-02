<?php

namespace App\Models\Pagamento;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class PagamentoDinheiro extends Pagamento
{
    use HasFactory;

    public function __construct()
    {
        $this->tipo = 'DINHEIRO';
    }
}
