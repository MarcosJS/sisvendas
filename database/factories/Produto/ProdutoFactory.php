<?php

namespace Database\Factories\Produto;

use App\Models\Produto\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutoFactory extends Factory
{
    protected $model = Produto::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->firstName,
            'descricao' => $this->faker->text(100),
            'preco' => $this->faker->randomFloat(2,1,10)
        ];
    }
}
