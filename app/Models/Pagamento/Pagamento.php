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
        'tipo', 'valor', 'dtpagamento'
    ];

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

    public function movimento() {
        return $this->hasOne('App\Models\Caixa\MovimentoCaixa');
    }

    public function concluir(Caixa $caixa, $usuario = null) {
        $statusPago = StatusPagamento::where('nomestatus', '=', 'PAGO')->first();
        $this->statusPagamento()->associate($statusPago);
        $this->save();

        date_default_timezone_set('America/Recife');
        $data = date("Y-m-d");

        $usu = Auth::user();
        if ($usuario != null) {
            $usu = $usuario;
        }

        if ($caixa != null) {
            if ($caixa->aberto()) {
                $caixa->addMovimento('ENTRADA', 'RECEBIMENTO', $this->valor, $data, $usu, $this);
            } else {
                throw new OperacaoNaoPermitidaParaCaixaFechadoException();
            }
        } else {
            throw new OCaixaNaoFoiInicializadoException();
        }
    }
}
