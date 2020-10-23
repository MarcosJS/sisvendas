<?php

namespace Database\Factories;

use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutoFactory extends Factory
{
    protected $model = Produto::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->firstName,
            'descricao' => $this->faker->text(100),
            //'estoque' => $this->faker->numberBetween(100,200),
            'preco' => $this->faker->randomFloat(2,1,10)
        ];
    }
}
