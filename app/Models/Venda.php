<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = [
        'dtvenda', 'hrvenda', 'totalprodutos', 'descporcentagem', 'desccifra', 'creditoaplicado', 'totalliq', 'nomecliente'
    ];

    public  static $rules = [
        'dtvenda' => 'require|date',
        'hrvenda' => 'require|date_format:H:i:s',
        'totalprodutos' => 'numeric|min:0',
        'descporcentagem' => 'nullable|numeric|min:0|max:1',
        'desccifra' => 'nullable|numeric|min:0',
        'totalliq' => 'numeric|min:0',
        'nomecliente' => 'nullable|min:5|max:100'
    ];

    public static $messages = [
        'dtvenda.require' => 'O campo data é obrigatório',
        'dtvenda.date' => 'Este campo deve ser do tipo data',
        'hrvenda.require' => 'O campo hora é obrigatório',
        'hrvenda.date_format:H:i:s' => 'Este campo deve ser do timpo hora (H:M:S)',
        'totalprodutos.required' => 'O campo totalprodutos é obrigatório',
        'totalprodutos.numeric' => 'O campo totalprodutos deve ser do  tipo numerico',
        'totalprodutos.min' => 'O totalprodutos deve ser maior que 0 (zero)',
        'descporcentagem.numeric' => 'O campo desconto deve ser do  tipo numerico',
        'descporcentagem.min' => 'O desconto deve ser maior que 0 (zero)',
        'desccifra.numeric' => 'O campo desconto deve ser do  tipo numerico',
        'desccifra.min' => 'O desconto deve ser maior que 0 (zero)',
        'descporcentagem.max' => 'O desconto deve ser menor que 1 (um)',
        'totalliq.required' => 'O campo totalliq é obrigatório',
        'totalliq.numeric' => 'O campo totalliq deve ser do  tipo numerico',
        'totalliq.min' => 'O totalliq deve ser maior que 0 (zero)',
        'nomecliente.min'=>'O nome deve ter no mínimo 5 letras',
        'nomecliente.max'=>'O nome deve ter no máximo 100 letras',
    ];

    public function vendaItens() {
        return $this->hasMany('App\Models\VendaItem');
    }

    public function usuario() {
        return $this->belongsTo('App\Models\Usuario');
    }

    public function cliente() {
        return $this->belongsTo('App\Models\Cliente\Cliente');
    }

    public function statusVenda() {
        return $this->belongsTo('App\Models\StatusVenda');
    }

    public function pagamentos() {
        return $this->hasMany('App\Models\Pagamento\Pagamento');
    }

    public function vales() {
        return $this->hasMany('App\Models\Pagamento\Vale');
    }

    public  function creditoGerado() {
        return $this->hasOne('App\Models\Cliente\MovimentoCreditoCliente');
    }

    public  function creditoDebitado() {
        return $this->hasOne('App\Models\Cliente\MovimentoCreditoCliente');
    }

    public function atualizarValores()
    {
        if($this->vendaItens != null){
            $this['totalprodutos'] = $this->vendaItens()->sum('subtotal');
            $this['totalliq'] = $this['totalprodutos'] * $this['descporcentagem'];

            if($this['desccifra'] > 0) {
                $this['totalliq'] = $this['totalprodutos'] - $this['desccifra'];
            }

            if($this->cliente != null) {

                if($this->cliente->saldoCredito() >= $this['totalliq']) {
                    $this['creditoaplicado']  = $this['totalliq'];
                    $this['totalliq'] = 0;
                } else {
                    $this['totalliq'] -= $this->cliente->saldoCredito();
                    $this['creditoaplicado'] = $this->cliente->saldoCredito();
                }
            } else {
                $this['creditoaplicado'] = 0;
            }

            $this->save();
        }
    }

    public function descPorcent() {
        return (1 - $this['descporcentagem']) * 100;
    }

    public function descCifra() {
        return $this['desccifra'];
    }

    public function aReceber() {
        $valorPago = 0;
        foreach ($this->pagamentos as $pagamento) {
            $valorPago += $pagamento->valor;
        }
        return $this['totalliq'] - $valorPago;
    }
}
