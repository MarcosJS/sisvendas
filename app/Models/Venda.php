<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = [
        'dtvenda', 'hrvenda', 'totalprodutos', 'desconto', 'totalliq', 'nomecliente'
    ];

    public  static $rules = [
        'dtvenda' => 'require|date',
        'hrvenda' => 'require|date_format:H:i:s',
        'totalprodutos' => 'numeric|min:0',
        'desconto' => 'numeric|min:0|max:1',
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
        'desconto.required' => 'O campo desconto é obrigatório',
        'desconto.numeric' => 'O campo desconto deve ser do  tipo numerico',
        'desconto.min' => 'O desconto deve ser maior que 0 (zero)',
        'desconto.max' => 'O desconto deve ser menor que 1 (um)',
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
        return $this->belongsTo('App\Models\Cliente');
    }

    public function statusVenda() {
        return $this->belongsTo('App\Models\StatusVenda');
    }

    public function pagamentos() {
        return $this->hasMany('App\Models\Pagamento\Pagamento');
    }

    public function atualizarValores()
    {
        if($this->vendaItens()){
            $this->totalprodutos = $this->vendaItens()->sum('subtotal');
            if($this->desconto === null) {
                $this->desconto = 1;
            }
            $this->totalliq = $this->totalprodutos * $this->desconto;
            $this->save();
        }
    }

    public function descPorcent() {
        return (1 - $this->desconto) * 100;
    }
}
