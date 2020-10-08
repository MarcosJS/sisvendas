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

    private function cpfUsuario($cpf) {
        $cpfCadastrados = Usuario::where('cpf', '=', $cpf)->count();
        if($cpfCadastrados > 0) {
            $cpf = $this->faker->cpf;
            return $this->cpfUsuario($cpf);
        }
        return $cpf;
    }
    private function emailUsuario($email) {
        $emailsCadastrados = Usuario::where('cpf', '=', $email)->count();
        if($emailsCadastrados > 0) {
            $email = $this->faker->email;
            return $this->cpfUsuario($email);
        }
        return $email;
    }

    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'email' => $this->emailUsuario($this->faker->email),
            'cpf' => preg_replace("/[^0-9]/", "", $this->cpfUsuario($this->faker->cpf)),
            'matricula' => $this->faker->numberBetween(100,10000)
        ];
    }
}
