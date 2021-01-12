<?php

namespace App\Models;

use App\Models\Caixa\Caixa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sistema extends Model
{
    use HasFactory;

    private $caixa;
    private $competencia;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this['caixa'] = Caixa::first();
        if ($this['caixa'] == null) {
            $caixa = new Caixa();
            $caixa->save();
            $this['caixa'] = Caixa::first();
        }

        $this['competencia'] = Competencia::all()->sortByDesc('id')->first();
        if ($this['competencia'] == null) {
            $competencia = new Competencia();
            $competencia['numero'] = 1;
            $competencia['exercicio'] = 2021;
            date_default_timezone_set('America/Recife');
            $competencia['dtabertura'] = date("Y-m-d");

            $competencia->save();
            $competencia = Competencia::all()->sortByDesc('id')->first();

            $this['competencia'] = $competencia;
        }

    }

    public function caixa () {
        return $this['caixa'];
    }

    public function competencia () {
        return $this['competencia'];
    }

    public function novaCompetencia () {
        $novaCompetencia = new Competencia();

        if ($this['competencia']['numero'] >= 12) {
            $novaCompetencia['numero'] = 1;
            $novaCompetencia['exercicio'] = $this['competencia']['exercicio'] + 1;
        } elseif ($this['competencia']['numero'] > 0 && $this['competencia']['numero'] < 12) {
            $novaCompetencia['numero'] = $this['competencia']['numero'] + 1;
            $novaCompetencia['exercicio'] = $this['competencia']['exercicio'];
        } else {
            throw new \Exception('[URGENTE] Erro na consistência de dados do sistema, contate o desenvolvedor.');
        }

        date_default_timezone_set('America/Recife');
        $data = date("Y-m-d");
        $this['competencia']['dtfechamento'] = $data;
        $novaCompetencia['dtabertura'] = $data;

        $this['competencia']->update();
        $novaCompetencia->save();
        $novaCompetencia = Competencia::all()->sortByDesc('id')->first();

        $this['competencia'] = $novaCompetencia;

        return true;
    }
}
