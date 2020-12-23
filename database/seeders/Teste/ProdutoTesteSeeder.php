<?php

namespace Database\Seeders\Teste;

use App\Models\Produto\Produto;
use App\Models\Produto\TipoMovEstoque;
use App\Models\Usuario;
use Database\Factories\Produto\MovimentoEstoque;
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
            $resultado = rand(strtotime('2020-01-01'), strtotime('2020-10-28'));
            $produto->addMovEstoque(1, 1, random_int(2000, 5000), date("Y-m-d", $resultado), 1);
        }
    }
}
