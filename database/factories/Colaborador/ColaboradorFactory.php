<?php

namespace Database\Factories\Colaborador;

use App\Models\Colaborador\Colaborador;

use Illuminate\Database\Eloquent\Factories\Factory;

class ColaboradorFactory extends Factory
{
    protected $model = Colaborador::class;

    private function cpfCliente($cpf) {
        $cpfCadastrados = Colaborador::where('cpf', '=', $cpf)->count();
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
            'dtnascimento' => $this->faker->date('Y-m-d','now'),
            'cpf' => preg_replace("/[^0-9]/", "", $this->cpfCliente($this->faker->cpf)),
            'status' => 1,
            'salario' => 1100
        ];
    }
}
