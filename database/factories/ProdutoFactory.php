<?php

namespace Database\Factories;

use App\Models\Produto;
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

class ProdutoFactory extends Factory
{
    protected $model = Produto::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->randomElement(['fuba', 'xerem', 'flocao', 'milho']),
            'descricao' => $this->faker->text(100),
            'estoque' => $this->faker->numberBetween(100,200),
            'preco' => $this->faker->randomFloat(2,1,10)
        ];
    }
}
