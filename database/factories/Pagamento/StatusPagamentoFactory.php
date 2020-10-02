<?php

namespace Database\Factories\Pagamento;

use App\Models\Pagamento\StatusPagamento;
use Illuminate\Database\Eloquent\Factories\Factory;

class StatusPagamentoFactory extends Factory
{
    protected $model = StatusPagamento::class;

    /**
     * @inheritDoc
     */
    public function definition()
    {
        return [
            'nomestatus' => $this->faker->firstName
        ];
    }
}
