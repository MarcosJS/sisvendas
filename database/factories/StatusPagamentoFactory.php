<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StatusPagamentoFactory extends Factory
{

    public function definition()
    {
        return [
            'nomestatuspagamento' => $this->faker->firstName
        ];
    }
}
