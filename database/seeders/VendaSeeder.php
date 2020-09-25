<?php

namespace Database\Seeders;

use App\Models\Venda;
use App\Models\VendaItem;
use Illuminate\Database\Seeder;

class VendaSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        Venda::factory()->count(5)
            ->state(['usuario_id'=>1, 'cliente_id'=>2])
            ->has(VendaItem::factory()->count(5), 'vendaItens')
            ->create();
    }
}
