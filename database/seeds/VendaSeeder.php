<?php

use App\Cliente;
use App\Usuario;
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
                $v->vendaItens()->saveMany(factory(VendaItem::class, 5)->make());
                for($i = 1; $i <= 5; $i++) {
                    $v->vendaItens[$i-1]->produtos()->attach($i);
                }
            });
    }
}
