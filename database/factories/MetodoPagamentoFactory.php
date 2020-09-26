<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MetodoPagamentoFactory extends Factory
{

    /**
     * @inheritDoc
     */
    public function definition()
    {
        return [
            'nomemetodopagamento' => $this->faker->firstName
        ];
    }
}
