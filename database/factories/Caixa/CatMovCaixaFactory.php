<?php

namespace Database\Factories\Caixa;

use App\Models\Caixa\CatMovCredCliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class CatMovCaixaFactory extends Factory
{
    protected $model = CatMovCredCliente::class;

    private function nomeCat($nome) {
        $catCadastrado = CatMovCredCliente::where('nome', '=', $nome)->count();
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
