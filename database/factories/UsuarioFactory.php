<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Usuario;
use Faker\Generator as Faker;
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

$factory->define(Usuario::class, function (Faker $faker) {
    return [
        'nome'=>$faker->name,
        'email'=>$faker->email,
        'senha'=>Hash::make($faker->randomElement(['teste1', 'teste2'])),
        'cpf'=>preg_replace("/[^0-9]/", "", $faker->cpf),
        'matricula'=>$faker->numberBetween(1,100)
    ];
});
