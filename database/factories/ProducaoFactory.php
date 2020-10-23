<?php

namespace Database\Factories;

use App\Models\Producao;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProducaoFactory extends Factory
{
    protected $model = Producao::class;

    public function definition()
    {
        return [
            'quantidade' => $this->faker->numberBetween(100,200),
            'dtproducao' => $this->faker->date('Y-m-d')
        ];
    }
}
