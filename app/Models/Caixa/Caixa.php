<?php

namespace App\Models\Caixa;

use App\Models\Usuario;
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
                $turno->abertura = date("Y-m-d H:i:s");

                if ($usuario == null) {
                    $turno->usuario()->associate(Auth::user());
                } else {
                    $turno->usuario()->associate($usuario);
                }

                $turno->caixa()->associate($this);
                $statusTurno = StatusTurno::where('nome', '=', 'ABERTO')->first();
                $turno->statusTurno()->associate($statusTurno);
                $turno->save();
                $this->turnoAtual = $turno->id;
                $this->save();
            });
        }
    }

    public function fechar() {
        if ($this->aberto()) {
            DB::transaction(function () {
                $turno = Turno::find($this->turnoAtual);
                date_default_timezone_set('America/Recife');
                $turno->fechamento = date("Y-m-d H:i:s");
                $statusTurno = StatusTurno::where('nome', '=', 'FECHADO')->first();
                $turno->statusTurno()->associate($statusTurno);
                $turno->save();
                $this->turnoAtual = null;
                $this->save();
            });
        }
    }

    public function obterSaldo($filtro = null) {
        $saldo = 0;
        try {
            $turno = Turno::find($this->turnoAtual);
            if ($turno != null) {
                if ($filtro == null) {
                    foreach ($turno->movimentos as $movimento) {
                        $saldo += $movimento->valor;
                    }
                }
            }
            return $saldo;
        } catch (\Exception $exception) {
            return $saldo;
        }
    }

    public function addMovimento($tipo, $categoria, $valor, $data, $usuario, $recebimento = null) {
        $movimento = new MovimentoCaixa();
        $movimento['valor'] = $valor;
        $movimento['dt_movimento'] = $data;

        $tipo = TipoMovCaixa::where('nome', '=', $tipo)->first();
        $movimento->tipoMovCaixa()->associate($tipo);

        $cat = CatMovCaixa::where('nome', '=', $categoria)->first();
        $movimento->catMovCaixa()->associate($cat);

        $movimento->usuario()->associate($usuario);

        $turno = Turno::find($this->turnoAtual);
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
