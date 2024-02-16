<?php

namespace Database\Factories\Caixa;

use App\Models\Caixa\TipoMovCaixa;
use Illuminate\Database\Eloquent\Factories\Factory;

class TipoMovCaixaFactory extends Factory
{
    protected $model = TipoMovCaixa::class;

    private function nomeTipo($nome) {
        $tipoCadastrado = TipoMovCaixa::where('nome', '=', $nome)->count();
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
