<?php

namespace App\Models\Pagamento;

use App\Exceptions\OCaixaNaoFoiInicializadoException;
use App\Exceptions\OperacaoNaoPermitidaParaCaixaFechadoException;
use App\Models\Caixa\Caixa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Pagamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'valor', 'dtpagamento'
    ];

    public function tipoPagamento() {
        return $this->belongsTo('App\Models\Pagamento\TipoPagamento');
    }

    public function venda() {
        return $this->belongsTo('App\Models\Venda');
    }

    public function vale() {
        return $this->belongsTo('App\Models\Pagamento\Vale');
    }

    public function statusPagamento() {
        return $this->belongsTo('App\Models\Pagamento\StatusPagamento');
    }

    public function cheque() {
        return $this->hasOne('App\Models\Pagamento\Cheque');
    }

    public function transferencia() {
        return $this->hasOne('App\Models\Pagamento\Transferencia');
    }

    public function movimento() {
        return $this->hasOne('App\Models\Caixa\MovimentoCaixa');
    }

    public function concluir(Caixa $caixa, $usuario = null) {
        $usu = Auth::user();
        if ($usuario != null) {
            $usu = $usuario;
        }

        if ($caixa != null) {
            if ($caixa->aberto()) {
                $statusPago = StatusPagamento::find(2);
                $this->statusPagamento()->associate($statusPago);
                $this->save();

                date_default_timezone_set('America/Recife');
                $data = date("Y-m-d");
                $hora = date("H:i:s");

                $caixa->addMovimento(3, $this['valor'], $data, $hora, null, $usu, $this);
            } else {
                throw new OperacaoNaoPermitidaParaCaixaFechadoException('Esse operação não é permitida para caixa fechado');
            }
        } else {
            throw new OCaixaNaoFoiInicializadoException('O caixa não foi inicializado');
        }
    }

    public function cancelar(Caixa $caixa, $usuario = null) {
        $usu = Auth::user();
        if ($usuario != null) {
            $usu = $usuario;
        }

        if ($caixa != null) {
            if ($caixa->aberto()) {
                $statusPago = StatusPagamento::find(4);
                $this->statusPagamento()->associate($statusPago);
                $this->save();

                date_default_timezone_set('America/Recife');
                $data = date("Y-m-d");
                $hora = date("H:i:s");

                $caixa->addMovimento(2, 5, -$this->valor, $data, $hora, null, $usu, $this);
            } else {
                throw new OperacaoNaoPermitidaParaCaixaFechadoException('Esse operação não é permitida para caixa fechado');
            }
        } else {
            throw new OCaixaNaoFoiInicializadoException('O caixa não foi inicializado');
        }
    }
}
