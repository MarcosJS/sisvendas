<?php

namespace Database\Factories;

use App\Models\Cliente;

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

class ClienteFactory extends Factory
{
    protected $model = Cliente::class;

    private function cpfCliente($cpf) {
        $cpfCadastrados = Cliente::where('cpf', '=', $cpf)->count();
        if($cpfCadastrados > 0) {
            $cpf = $this->faker->cpf;
            return $this->cpfCliente($cpf);
        }
        return $cpf;
    }

    public function definition()
    {
        return [
                'nome' => $this->faker->name,
                'datanasc' => $this->faker->date('Y-m-d','now'),
                'cpf' => preg_replace("/[^0-9]/", "", $this->cpfCliente($this->faker->cpf))
                ];
    }
}
