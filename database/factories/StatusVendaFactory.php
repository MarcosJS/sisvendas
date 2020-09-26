<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StatusVendaFactory extends Factory
{

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
