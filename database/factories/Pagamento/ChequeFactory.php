<?php

namespace Database\Factories\Pagamento;

use App\Models\Pagamento\Cheque;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChequeFactory extends Factory
{
    protected $model = Cheque::class;

    /**
     * @inheritDoc
     */
    public function definition()
    {
        $numero = Cheque::count();
        return [
            'numero' => $numero + 1000,
            'valor' => $this->faker->randomFloat(2,50,1000),
            'vencimento' => $this->faker->date('Y-m-d'),
            'emissao' => $this->faker->date('Y-m-d'),
            'banco' => $this->faker->numberBetween(100,100),
            'agencia' => $this->faker->numberBetween(1000, 5000),
            'contacorrente' => $this->faker->bankAccountNumber
        ];
    }
}
