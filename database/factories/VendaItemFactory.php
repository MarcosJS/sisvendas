<?php

namespace Database\Factories;

use App\Models\VendaItem;
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

class VendaItemFactory extends Factory
{
    protected $model = VendaItem::class;

    public function definition()
    {
        return [
            'qtd' => $this->faker->numberBetween(1,20),
            'precofinal' => $this->faker->randomFloat(2, 1,3),
            'subtotal' => $this->faker->randomFloat(2, 3, 6),
            'produto_id' => $this->faker->numberBetween(1,6)
        ];
    }
}
