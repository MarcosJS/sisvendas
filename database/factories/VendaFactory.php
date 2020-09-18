<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Venda;
use Faker\Generator as Faker;

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

$factory->define(Venda::class, function (Faker $faker) {
    return [
        'dtvenda'=>$faker->date('Y-m-d'),
        'hrvenda'=>$faker->time('h:i:s'),
        'totalprodutos'=>$faker->numberBetween(1,10),
        'desconto'=>1,
        'totalliq'=>$faker->randomFloat(2,50,200),
        'dtpagamento'=>$faker->date('Y-m-d'),
        'metodopg'=>'dinheiro',
        'status'=>'em andamento'
    ];
});
