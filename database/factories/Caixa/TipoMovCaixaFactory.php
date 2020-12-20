<?php

namespace Database\Factories\Caixa;

use App\Models\Caixa\TipoMovCredCliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class TipoMovCaixaFactory extends Factory
{
    protected $model = TipoMovCredCliente::class;

    private function nomeTipo($nome) {
        $tipoCadastrado = TipoMovCredCliente::where('nome', '=', $nome)->count();
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
