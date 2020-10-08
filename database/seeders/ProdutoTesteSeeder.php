<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ProdutoTesteSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        Produto::factory()->count(6)
            ->state(new Sequence(
                ['nome' => 'fuba'],
                ['nome' =>'xerem'],
                ['nome' => 'flocao'],
                ['nome' => 'milho'],
                ['nome' => 'amido'],
                ['nome' => 'trigo']
            ))
            ->create();
    }
}
