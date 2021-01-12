<?php

namespace Database\Seeders;

use App\Models\Competencia;
use Illuminate\Database\Seeder;

class CompetenciaSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $competencia = new Competencia();
        $competencia['numero'] = 1;
        $competencia['exercicio'] = 2021;
        $competencia['dtabertura'] = '2021-01-04';
        $competencia->save();
    }
}
