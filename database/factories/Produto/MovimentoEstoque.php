<?php

namespace Database\Factories\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovimentoEstoque extends Factory
{

    public function definition()
    {
        return [
            'quantidade' => $this->faker->numberBetween(100,200),
            'dtmovimento' => $this->faker->date('Y-m-d')
        ];
    }
}
