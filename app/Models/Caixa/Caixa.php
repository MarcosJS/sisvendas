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

    public function abrir() {
        if (!$this->aberto()) {
            DB::transaction(function () {
                $turno = new Turno();
                date_default_timezone_set('America/Recife');
                $turno->abertura = date("Y-m-d H:i:s");
                $turno->usuario()->associate(Auth::user());
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
                    //itera todos os movimentos do turno
                }
            }
            return $saldo;
        } catch (\Exception $exception) {
            return $saldo;
        }
    }

    public function addMovimento() {
        //
    }

    public function turnos() {
        return $this->hasMany('App\Models\Caixa\Turno');
    }
}
