<?php

namespace Tests\Browser;

use App\Models\Usuario;
use Database\Seeders\DatabaseTesteSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CadastrarProdutoTest extends DuskTestCase
{
    public function setUp(): void
    {
        $this->appUrl = env('APP_URL');
        parent::setUp();
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');
        $this->artisan('db:seed', ['--class' => 'DatabasetesteSeeder']);
    }
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCadastrarProduto() {
        $this->browse(function ($primeiro) {
            $primeiro->loginAs(Usuario::find(1))
                ->visit('/produto/novo')
                ->assertRouteIs('novoproduto')
                ->screenshot('cadprod/1-formulario')
                ->type('nome', 'farinha branca')
                ->type('descricao', 'farinha de trigo')
                ->type('estoque', 100)
                ->type('preco', 4.50)
                ->screenshot('cadprod/2-preenchido')
                ->press('Cadastrar')
                ->assertRouteIs('produtos')
                ->assertSee('farinha branca')
                ->screenshot('cadprod/3-prodcadastrado');
        });
    }
}
