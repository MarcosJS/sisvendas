<?php

namespace Database\Factories;

use App\Models\Telefone;
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

class TelefoneFactory extends Factory
{
    protected $model = Telefone::class;

    public function definition()
    {
        return [
            'numerotel' => preg_replace("/[^0-9]/", "", $this->faker->phoneNumber)
        ];
    }
}
