<?php

namespace Database\Factories\Pagamento;

use App\Models\Pagamento\PagamentoCheque;
use Illuminate\Database\Eloquent\Factories\Factory;

class PagamentoChequeFactory extends Factory
{
    protected $model = PagamentoCheque::class;

    public function definition()
    {
        return [
            'valor' => $this->faker->randomFloat(2,50,200),
            'dtpagamento' => $this->faker->date('Y-m-d')
        ];
    }
}
