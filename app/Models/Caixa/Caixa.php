<?php

namespace App\Models\Caixa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Caixa extends Model
{
    use HasFactory;

    protected $fillable = ['turnoAtual'];

    public function aberto() {
        $resultado = false;
        if($this->turnoAtual != null) {
            $resultado = true;
        }
        return $resultado;
    }

    public function abrir($usuario = null) {
        if (!$this->aberto()) {
            DB::transaction(function () use ($usuario) {
                $turno = new Turno();
                date_default_timezone_set('America/Recife');
                //$turno['abertura'] = date("Y-m-d H:i:s");
                $turno->abertura = date("Y-m-d H:i:s");

                if ($usuario == null) {
                    $turno->usuario()->associate(Auth::user());
                } else {
                    $turno->usuario()->associate($usuario);
                }

                $turno->caixa()->associate($this);
                $statusTurno = StatusTurno::where('nome', '=', 'ABERTO')->first();
                //$statusTurno = DB::table('status_turnos')->where('nome', '=', 'ABERTO')->first();
                $turno->statusTurno()->associate($statusTurno);
                $turno->saldo_anterior = $this->obterSaldo();
                $turno->save();
                $this->turnoAtual = $turno->id;
                $this->save();
            });
        }
    }

    public function fechar() {
        if ($this->aberto()) {
            DB::transaction(function () {
                //$turno = DB::table('turno')->find($this['turnoAtual']);
                $turno = Turno::find($this['turnoAtual']);
                date_default_timezone_set('America/Recife');
                $turno['fechamento'] = date("Y-m-d H:i:s");
                $statusTurno = StatusTurno::where('nome', '=', 'FECHADO')->first();
                $turno->statusTurno()->associate($statusTurno);
                $turno->save();
                $this['turnoAtual'] = null;
                $this->save();
            });
        }
    }

    public function obterSaldo($movimento = null) {
        $saldo = 0;

        $turnoAlvo = Turno::orderByDesc('id')->first();

        if ($movimento != null) {
            $turnoAlvo = $movimento->turno;
            $saldo = $turnoAlvo->saldo_anterior;

            foreach ($turnoAlvo->movimentos->sortBy('id') as $mov) {
                if ($mov->id <= $movimento->id) {
                    $saldo += $mov->valor;
                } else {
                    break;
                }
            }
        } else {
            if($turnoAlvo != null) {
                $saldo = $turnoAlvo['saldo_anterior'];
                foreach ($turnoAlvo->movimentos as $mov) {
                    $saldo += $mov->valor;
                }
            }
        }
        return $saldo;
    }

    public function addMovimento($tipo, $categoria, $valor, $data, $hora, $observacao, $usuario, $recebimento = null) {
        $movimento = new MovimentoCaixa();
        $movimento['valor'] = $valor;
        $movimento['dt_movimento'] = $data;
        $movimento['hr_movimento'] = $hora;
        $movimento['observacao'] = $observacao;

        $tipo = TipoMovCaixa::find($tipo);
        $movimento->tipoMovCaixa()->associate($tipo);

        $cat = CatMovCaixa::find($categoria);
        $movimento->catMovCaixa()->associate($cat);

        $movimento->usuario()->associate($usuario);

        $turno = Turno::find($this['turnoAtual']);
        $movimento->turno()->associate($turno);

        if ($recebimento != null) {
            $movimento->pagamento()->associate($recebimento);
        }

        $movimento->save();
    }

    public function turnos() {
        return $this->hasMany('App\Models\Caixa\Turno');
    }
}
