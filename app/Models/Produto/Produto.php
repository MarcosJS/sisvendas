<?php

namespace App\Models\Produto;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Produto extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable     = [
        'nome', 'descricao', 'estoque', 'preco', 'saldo_control_estoque', 'interv_controle', 'controle_estoque'
    ];

    public static $rules = [
        'nome' => 'required|min:2|max:50',
        'descricao' => 'max:100',
        'estoque' => 'required|integer|min:0',
        'preco' => 'required|numeric|min:0'
    ];

    public static $messages = [
        'nome.required' => 'O campo nome é obrigatório',
        'nome.min' => 'O nome deve ter no mínimo 2 letras',
        'nome.max' => 'O nome deve ter no máximo 100 letras',
        'descricao.*' => 'A descrição deve ter no máximo 100 letras',
        'estoque.required' => 'O campo estoque é obrigatório',
        'estoque.integer' => 'O estoque deve ser é um numero inteiro',
        'estoque.min' => 'O estoque deve ser maior que 0 (zero)',
        'preco.required' => 'O campo preço é obrigatório',
        'preco.numeric' => 'O campo preço deve ser do  tipo numerico',
        'preco.min' => 'O preço deve ser maior que 0 (zero)'
    ];

    public function movimentoEstoques() {
        return $this->hasMany('App\Models\Produto\MovimentoEstoque');
    }

    public function vendaItens() {
        return $this->hasMany('App\Models\VendaItem');
    }

    public function estoqueApartirMovs() {
        return $this->movimentoEstoques()->sum('quantidade');
    }

    public function atualizarEstoque() {
        if ($this->controle_estoque) {
            $totalMovimentos = $this->movimentoEstoques()->count();

            $pontoControle = -1;
            if ($totalMovimentos > 0) {
                $pontoControle = $totalMovimentos % $this->interv_controle;
            }

            //É hora de atualizar o saldo de controle do estoque
            if ($pontoControle == 0) {
                $indiceBusca = $totalMovimentos - $this->interv_controle;
                $somaMovimentos = $this->movimentoEstoques()->sortBy('dtmovimento')->skip($indiceBusca)->sum('quantidade');
                $this->saldo_control_estoque = $this->saldo_control_estoque + $somaMovimentos;
                $this->estoque = $this->saldo_control_estoque;
            } else {//Não é hora de atualizar o saldo de controle do estoque
                $indiceBusca = $totalMovimentos / $this->interv_controle;
                $indiceBusca *= $this->interv_controle;
                $somaMovimentos = $this->movimentoEstoques()->sortBy('dtmovimento')->skip($indiceBusca)->sum('quantidade');
                $this->estoque = $this->saldoControlEstoque + $somaMovimentos;
            }
        } else {
            $somaMovimentos = $this->movimentoEstoques()->sum('quantidade');
            $this->saldo_control_estoque = $somaMovimentos;
            $this->estoque = $somaMovimentos;
        }

        $this->save();
    }

    public function addMovEstoque($tipo, $categoria, $qtd, $data, $idUsuario) {
        $movimento = new MovimentoEstoque();
        $movimento->quantidade = $qtd;
        $movimento->dtmovimento = $data;

        $tip = TipoMovEstoque::where('nome', '=', $tipo)->first();
        $movimento->tipoMovEstoque()->associate($tip);

        $cat = CatMovEstoque::where('nome', '=', $categoria)->first();
        $movimento->CatMovEstoque()->associate($cat);

        $usuario = Usuario::find($idUsuario);
        $movimento->usuario()->associate($usuario);

        $movimento->produto()->associate($this);

        $movimento->save();

        $this->atualizarEstoque();
    }
}
