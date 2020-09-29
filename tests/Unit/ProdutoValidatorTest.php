<?php

namespace Tests\Unit;

use App\Models\Produto;
use App\Validator\ProdutoValidator;
use App\Validator\ValidationException;
use Tests\TestCase;

class ProdutoValidatorTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testProdutoSemNome()
    {
        $this->expectException(ValidationException::class);
        $produto = Produto::factory()->make(['nome' => '']);
        ProdutoValidator::validate($produto->toArray());
    }

    public function testProdutoNomeMenorQueMinimo()
    {
        $this->expectException(ValidationException::class);
        $produto = Produto::factory()->make(['nome' => 'f']);
        ProdutoValidator::validate($produto->toArray());
    }

    public function testProdutoNomeMaiorQueMaximo()
    {
        $this->expectException(ValidationException::class);
        $produto = Produto::factory()->make(
            ['nome' => 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
            aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
            aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'
            ]);
        ProdutoValidator::validate($produto->toArray());
    }

    public function testProdutoDescricaoMaiorQueMaximo()
    {
        $this->expectException(ValidationException::class);
        $produto = Produto::factory()->make(
            ['descricao' => 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
            aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
            aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'
            ]);
        ProdutoValidator::validate($produto->toArray());
    }

    public function testProdutoSemEstoque()
    {
        $this->expectException(ValidationException::class);
        $produto = Produto::factory()->make(['estoque' => '']);
        ProdutoValidator::validate($produto->toArray());
    }

    public function testProdutoEmQueEstoqueNaoEInteiro()
    {
        $this->expectException(ValidationException::class);
        $produto = Produto::factory()->make(['estoque' => 2.5]);
        ProdutoValidator::validate($produto->toArray());
    }

    public function testProdutoEmQueEstoqueMenorQueZero()
    {
        $this->expectException(ValidationException::class);
        $produto = Produto::factory()->make(['estoque' => -1]);
        ProdutoValidator::validate($produto->toArray());
    }

    public function testProdutoSemPreco()
    {
        $this->expectException(ValidationException::class);
        $produto = Produto::factory()->make(['preco' => '']);
        ProdutoValidator::validate($produto->toArray());
    }

    public function testProdutoEmQuePrecoNaoENumerico()
    {
        $this->expectException(ValidationException::class);
        $produto = Produto::factory()->make(['preco' => 'd']);
        ProdutoValidator::validate($produto->toArray());
    }

    public function testProdutoEmQuePrecoMenorQueZero()
    {
        $this->expectException(ValidationException::class);
        $produto = Produto::factory()->make(['preco' => -1]);
        ProdutoValidator::validate($produto->toArray());
    }

    public function testProdutoComDadosCorretos()
    {
        $produto = Produto::factory()->make();
        ProdutoValidator::validate($produto->toArray());
        $this->assertTrue(true);
    }
}
