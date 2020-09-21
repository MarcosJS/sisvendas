<?php

use App\Produto;
use App\Venda;
use App\VendaItem;
use Illuminate\Database\Seeder;

class VendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Venda::class, 5)
            ->create(['usuario_id'=>1, 'cliente_id'=>2])
            ->each(function ($v) {
                $v->vendaItens()->saveMany(factory(VendaItem::class, 5)->make()->each(function ($vi) {
                    $vi->produto()->associate(Produto::find(random_int(1,10)));
                }));
            });
    }
}
