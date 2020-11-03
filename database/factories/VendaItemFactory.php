<?php

namespace Database\Factories;

use App\Models\Produto\Produto;
use App\Models\VendaItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class VendaItemFactory extends Factory
{
    protected $model = VendaItem::class;

    public function definition()
    {
        $produto = Produto::find($this->faker->numberBetween(1,6));
        $qtd = $this->faker->numberBetween(1,100);
        $precoFinal = $produto->preco;

        return [
            'qtd' => $qtd,
            'precofinal' => $precoFinal,
            'subtotal' => $qtd * $precoFinal,
            'produto_id' => $produto->id
        ];
    }
}
