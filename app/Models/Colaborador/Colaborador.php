<?php

namespace App\Models\Colaborador;

use App\Exceptions\ObjetoNaoEncontradoException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 'dtnascimento', 'cpf', 'matricula', 'status', 'salario'
    ];

    public static $rules= [
        'nome'=>'required|min:5|max:100',
        'datanasc' => 'date',
        'cpf'=>'required|size:11|unique:App\Models\Colaborador\Colaborador,cpf',
        'matricula'=>'nullable|integer|min:1',
        'funcao'=>'required',
        'salario' => 'nullable|numeric|min:0'];

    public static $messages = [
        'nome.required'=>'O campo nome é obrigatório',
        'nome.min'=>'O nome deve ter no mínimo 5 letras',
        'nome.max'=>'O nome deve ter no máximo 100 letras',
        'datanasc.*'=>'Neste campo deve ser informada uma data',
        'cpf.required'=>'O campo cpf é obrigatório',
        'cpf.size'=>'O cpf deve ter apenas 11 digitos',
        'cpf.unique'=>'Este cpf já esta cadastrado',
        'matricula.integer'=>'A matrícula deve ser é um numero inteiro',
        'matricula.min'=>'O valor da matricula deve ser maior que 0',
        'funcao.required'=>'Uma função salário é obrigatório',
        'salario.numeric' => 'O campo salário deve ser do  tipo numerico',
        'salario.min' => 'O salário deve ser maior que 0 (zero)'
    ];

    public function endereco() {
        return $this->hasOne('App\Models\Endereco');
    }

    public function telefones() {
        return $this->hasMany('App\Models\Telefone');
    }

    public function movimentoSalarios() {
        return $this->hasMany('App\Models\Colaborador\MovimentoSalario');
    }

    public function funcao() {
        return $this->belongsTo('App\Models\Funcao');
    }

    public function addMovimentoSalario($categoria, $valor, $data, $competencia, $observacao = null) {
        $movimento = new MovimentoSalario();

        $movimento['dtmovimento'] = $data;
        $movimento['observacao'] = $observacao;

        $cat = CatMovSalario::find($categoria);
        if ($cat != null) {
            $movimento->catMovSalario()->associate($cat);
            $movimento->tipoMovSalario()->associate($cat->tipoMovSalario);

            if ($cat->tipoMovSalario->id == 1) {
                $movimento['valor'] = $valor;
            } else {
                $movimento['valor'] = -$valor;
            }
        } else {
            throw new ObjetoNaoEncontradoException('Objeto Categoria ['.gettype($cat).']=>id '.$categoria.'. não encontrado no banco de dados.');
        }

        $movimento->colaborador()->associate($this);

        $movimento->competencia()->associate($competencia);

        $movimento->save();

        return true;
    }
}
