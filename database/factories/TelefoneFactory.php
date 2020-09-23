<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Telefone;
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

$factory->define(Telefone::class, function (Faker $faker) {
    return [
        'numero'=>preg_replace("/[^0-9]/", "", $faker->phoneNumber)
    ];
});
