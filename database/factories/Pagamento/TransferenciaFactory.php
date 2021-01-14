<?php

namespace Database\Factories\Pagamento;

use App\Models\Pagamento\Transferencia;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransferenciaFactory extends Factory
{
    protected $model = Transferencia::class;

    /**
     * @inheritDoc
     */
    public function definition()
    {
        $bancos = ['BANCO DO BRASIL', 'CAIXA ECONOMICA FEDERAL', 'BRADESCO', 'BANCO DO NORDESTE'];
        return [
            'valor' => $this->faker->randomFloat(2,50,1000),
            'banco_origem' => $bancos[rand(0,2)],
            'agencia_origem' => $this->faker->numberBetween(1000, 5000),
            'conta_origem' => $this->faker->numberBetween(10000, 90000),
            'banco_destino' => $bancos[rand(0,2)],
            'agencia_destino' => $this->faker->numberBetween(1000, 5000),
            'conta_destino' => $this->faker->numberBetween(10000, 90000),
            'dttransferencia' => $this->faker->date('Y-m-d'),
        ];
    }
}
