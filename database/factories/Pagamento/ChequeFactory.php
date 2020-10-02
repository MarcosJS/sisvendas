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
        return [
            'numero' => $this->faker->numberBetween(100,1000)
        ];
    }
}
