<?php

namespace Database\Factories\Pagamento;

use App\Models\Pagamento\Pagamento;
use Illuminate\Database\Eloquent\Factories\Factory;

class PagamentoFactory extends Factory
{
    protected $model = Pagamento::class;

    public function definition()
    {
        return [
            'valor' => $this->faker->randomFloat(2,50,200),
            'dtpagamento' => $this->faker->date('Y-m-d')
        ];
    }
}
