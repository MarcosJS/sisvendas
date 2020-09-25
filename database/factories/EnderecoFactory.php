<?php

namespace Database\Factories;

use App\Models\Endereco;
use Illuminate\Database\Eloquent\Factories\Factory;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

class EnderecoFactory extends Factory
{
    protected $model = Endereco::class;

    public function definition()
    {
        return [
            'logradouro' => $this->faker->streetName,
            'numero' => $this->faker->numberBetween(1,100),
            'bairro' => $this->faker->name,
            'cidade' => $this->faker->city,
            'cep' => $this->faker->postcode
        ];
    }

}
