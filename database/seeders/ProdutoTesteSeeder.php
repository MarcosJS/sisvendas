<?php

namespace Database\Seeders;

use App\Models\Producao;
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
        $produtos = Produto::factory()->count(6)
            ->state(new Sequence(
                ['nome' => 'fuba'],
                ['nome' =>'xerem'],
                ['nome' => 'flocao'],
                ['nome' => 'milho'],
                ['nome' => 'amido'],
                ['nome' => 'trigo']
            ))
            ->create();

        foreach ($produtos as $produto) {
            $producao = Producao::factory()->make();
            $produto->estoque = $producao->quantidade;
            $produto->producao()->saveMany([$producao]);
            $produto->save();
        }
    }
}
