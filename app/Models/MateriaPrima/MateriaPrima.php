<?php

namespace App\Models\MateriaPrima;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MateriaPrima extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable     = [
        'nome', 'descricao', 'estoque', 'saldo_control_estoque', 'interv_controle', 'controle_estoque'
    ];

    public static $rules = [
        'nome' => 'required|min:2|max:50',
        'descricao' => 'max:100',
        'estoque' => 'nullable|integer|min:0'
    ];

    public static $messages = [
        'nome.required' => 'O campo nome é obrigatório',
        'nome.min' => 'O nome deve ter no mínimo 2 letras',
        'nome.max' => 'O nome deve ter no máximo 100 letras',
        'descricao.*' => 'A descrição deve ter no máximo 100 letras',
        'estoque.integer' => 'O estoque deve ser é um numero inteiro',
        'estoque.min' => 'O estoque deve ser maior que 0 (zero)'
    ];

    public function movimentosEstoqueMat() {
        return $this->hasMany('App\Models\MateriaPrima\MovimentoEstoqueMat');
    }

    public function compraItens() {
        return $this->hasMany('App\Models\Compra\CompraItem');
    }

    public function estoqueApartirMovs() {
        return $this->movimentosEstoqueMat()->sum('quantidade');
    }

    public function atualizarEstoque() {
        if ($this['controle_estoque']) {
            $totalMovimentos = $this->movimentosEstoqueMat()->count();

            $pontoControle = -1;
            if ($totalMovimentos > 0) {
                $pontoControle = $totalMovimentos % $this['interv_controle'];
            }

            //É hora de atualizar o saldo de controle do estoque
            if ($pontoControle == 0) {
                $indiceBusca = $totalMovimentos - $this['interv_controle'];
                $somaMovimentos = $this->movimentosEstoqueMat()->sortBy('dtmovimento')->skip($indiceBusca)->sum('quantidade');
                $this['saldo_control_estoque'] = $this['saldo_control_estoque'] + $somaMovimentos;
                $this['estoque'] = $this['saldo_control_estoque'];
            } else {//Não é hora de atualizar o saldo de controle do estoque
                $indiceBusca = $totalMovimentos / $this['interv_controle'];
                $indiceBusca *= $this['interv_controle'];
                $somaMovimentos = $this->movimentosEstoqueMat()->sortBy('dtmovimento')->skip($indiceBusca)->sum('quantidade');
                $this['estoque'] = $this['saldo_control_estoque'] + $somaMovimentos;
            }
        } else {
            $somaMovimentos = $this->movimentosEstoqueMat()->sum('quantidade');
            $this['saldo_control_estoque'] = $somaMovimentos;
            $this['estoque'] = $somaMovimentos;
        }

        $this->save();
    }

    public function addMovEstoqueMat($tipo, $categoria, $qtd, $data, $idUsuario, $observacao = null) {
        $movimento = new MovimentoEstoqueMat();
        $movimento['dtmovimento'] = $data;
        $movimento['observacao'] = $observacao;

        $quantidade = 0;
        if ($tipo == 2) {
            $quantidade  -= $qtd;
        } else {
            $quantidade = $qtd;
        }
        $movimento['quantidade'] = $quantidade;


        $tip = TipoMovEstoqueMat::find( $tipo);
        $movimento->tipoMovEstoqueMat()->associate($tip);

        $cat = CatMovEstoqueMat::find($categoria);
        $movimento->CatMovEstoqueMat()->associate($cat);

        $usuario = Usuario::find($idUsuario);
        $movimento->usuario()->associate($usuario);

        $movimento->MateriaPrima()->associate($this);

        $movimento->save();

        $this->atualizarEstoque();
    }
}
