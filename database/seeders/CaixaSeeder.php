<?php

namespace Database\Seeders;

use App\Models\Caixa\Caixa;
use Illuminate\Database\Seeder;

class CaixaSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $status = new Caixa();
        $status->save();
    }
}
