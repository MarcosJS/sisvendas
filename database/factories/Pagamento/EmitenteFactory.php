<?php

namespace Database\Factories\Pagamento;

use App\Models\Pagamento\Emitente;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmitenteFactory extends Factory
{
    protected $model = Emitente::class;

    /**
     * @inheritDoc
     */
    public function definition()
    {
        $tipo = $this->faker->randomElement(['PESSOA FISICA', 'PESSOA JURIDICA']);
        $inscricao = $this->faker->cpf;

        if($tipo == 'PESSOA JURIDICA')
                $inscricao = $this->faker->cnpj;

        return [
            'tipo' => $tipo,
            'inscricao' => preg_replace("/[^0-9]/", "", $inscricao),
            'nome' => $this->faker->name
        ];
    }
}
