<?php

namespace Database\Factories;

use App\Models\Venda;
use Illuminate\Database\Eloquent\Factories\Factory;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

class VendaFactory extends Factory
{
    protected $model = Venda::class;

    public function definition()
    {
        return [
            'dtvenda' => $this->faker->date('Y-m-d'),
            'hrvenda' => $this->faker->time('h:i:s'),
            'totalprodutos' => $this->faker->numberBetween(1,10),
            'desconto' => 1,
            'totalliq' => $this->faker->randomFloat(2,50,200),
            'dtpagamento' => $this->faker->date('Y-m-d'),
            'metodopg' => 'dinheiro',
            'status' => 'em andamento'
        ];
    }
}
