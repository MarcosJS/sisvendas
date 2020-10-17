<?php

namespace Tests\Browser;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Usuario;
use App\Models\Venda;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RealizarVendaTest extends DuskTestCase
{
    public function setUp(): void
    {
        $this->appUrl = env('APP_URL');
        parent::setUp();
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');
        $this->artisan('db:seed', ['--class' => 'DatabasetesteSeeder']);
    }

    public function testRealizarVenda()
    {
        $this->browse(function ($usuario) {
            $produto = Produto::where('nome', '=', 'fuba')->first();

            $usuario->loginAs(Usuario::find(1))
                ->visit('/')
                ->assertSee('SISVendas PDV')
                ->screenshot('realizarvenda/1-telainicial')
                ->clickLink('SISVendas PDV')
                ->assertPathIS('/venda/inicio')
                ->screenshot('realizarvenda/2-iniciovendas')
                ->clickLink('Nova Venda')
                ->assertPathIs('/venda/novo')
                ->screenshot('realizarvenda/3-telaitens')
                ->select('nomeproduto', $produto->id)
                ->screenshot('realizarvenda/4-selproduto')
                ->press('Adicionar')
                ->screenshot('realizarvenda/5-prodadded')
                ->clickLink('Pagamento')
                ->assertPathis('/venda/pagamento');

            $desconto = 50;
            $usuario->visit('/venda/pagamento')
                ->assertSee('Operação de Venda - Pagamento')
                ->screenshot('realizarvenda/6-telapagamento')
                ->type('novodesconto', $desconto)
                ->screenshot('realizarvenda/7-escrevendodesc')
                ->press('Aplicar')
                ->select('pagamento', 1)
                ->screenshot('realizarvenda/8-pagselecionado');

            $usuario->type('banco', 'Banco do Brasil')
                ->type('agencia', '2233')
                ->type('contacorrente', '16555')
                ->type('numero', '123456')
                ->type('vencimento', '10162020')
                ->radio('.radio', 'PESSOA FISICA')
                ->type('inscricao', '07733324433')
                ->type('nome', 'fulano do cheque')
                ->screenshot('realizarvenda/9-formchequepreenc')
                ->press('Registrar');

            $usuario->assertSee('Pagamentos')
                ->screenshot('realizarvenda/10-pagadded')
                ->clickLink('Validação')
                ->assertPathIs('/venda/validar')
                ->screenshot('realizarvenda/11-telavalidacao')
                ->click('#cliente');

            $cliente = Cliente::find(1);
            $usuario->screenshot('realizarvenda/12-telabuscarcliente')
                ->type('#clientepesq', $cliente->nome)
                ->screenshot('realizarvenda/13-cliente_1')
                ->click('.listaclientes')
                ->assertInputValue('#cliente', $cliente->cpf.' - '.$cliente->nome)
                ->screenshot('realizarvenda/14-clienteadded');

            $venda = str_replace('Venda nº ', '', $usuario->text('#col_venda_id'));
            $usuario->clickLink('Finalizar')
                ->assertPathIs('/vendas');

            $colunasId = $usuario->elements('.col_venda_id');
            foreach ($colunasId as $col) {
                if($col->getText('.col_venda_id') == $venda) {
                    self::assertTrue(true);
                }
            }

            $usuario->screenshot('realizarvenda/15-telavendas');
        });
    }
}
