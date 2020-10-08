<?php

namespace Database\Factories;

use App\Models\Funcao;
use Illuminate\Database\Eloquent\Factories\Factory;

class FuncaoFactory extends Factory
{
    protected $model = Funcao::class;

    private function nomeFuncao($nome) {
        $funcaoCadastrada = Funcao::where('nomefuncao', '=', $nome)->count();
        if($funcaoCadastrada > 0) {
            $nome = $this->faker->name;
            return $this->nomeFuncao($nome);
        }
        return $nome;
    }

    /**
     * @inheritDoc
     */
    public function definition()
    {
        return [
            'nomefuncao' => $this->nomeFuncao($this->faker->name),
            'nivel' => 1
        ];
    }
}
