<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

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

class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'email' => $this->faker->email,
            'cpf' => preg_replace("/[^0-9]/", "", $this->faker->cpf),
            'matricula' => $this->faker->numberBetween(100,10000)
        ];
    }
}
