<?php

namespace Database\Factories\Produto;

use App\Models\Produto\CatMovEstoque;
use Illuminate\Database\Eloquent\Factories\Factory;

class CatMovEstoqueFactory extends Factory
{
    protected $model = CatMovEstoque::class;

    private function nomeCat($nome) {
        $catCadastrado = CatMovEstoque::where('nome', '=', $nome)->count();
        if($catCadastrado > 0) {
            $nome = $this->faker->firstName;
            return $this->nomeCat($nome);
        }
        return $nome;
    }

    public function definition()
    {
        return [
            'nome' => $this->nomeCat($this->faker->firstName)
        ];
    }

}
