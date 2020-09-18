<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\VendaItem;

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

$factory->define(\App\VendaItem::class, function (Faker $faker) {
    return [
        'qtd'=>$faker->numberBetween(1,20),
        'precofinal'=>$faker->randomFloat(2, 1,3),
        'subtotal'=>$faker->randomFloat(2, 3, 6)
    ];
});
