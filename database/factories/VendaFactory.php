<?php

namespace Database\Factories;

use App\Models\Venda;
use Illuminate\Database\Eloquent\Factories\Factory;

class VendaFactory extends Factory
{
    protected $model = Venda::class;

    public function definition()
    {
        $resultado = rand(strtotime('2019-01-01'), strtotime('2020-10-28'));

        return [
            'dtvenda' => date("Y-m-d", $resultado),
            'hrvenda' => $this->faker->time('h:i:s'),
        ];
    }
}
