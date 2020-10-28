<?php

namespace Database\Factories\Produto;

use App\Models\Produto\TipoMovEstoque;
use Illuminate\Database\Eloquent\Factories\Factory;

class TipoMovEstoqueFactory extends Factory
{
    protected $model = TipoMovEstoque::class;

    private function nomeTipo($nome) {
        $tipoCadastrado = TipoMovEstoque::where('nome', '=', $nome)->count();
        if($tipoCadastrado > 0) {
            $nome = $this->faker->firstName;
            return $this->nomeTipo($nome);
        }
        return $nome;
    }

    public function definition()
    {
        return [
            'nome' => $this->nomeTipo($this->faker->firstName)
        ];
    }
}
