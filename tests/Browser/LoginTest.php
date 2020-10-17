<?php

namespace Tests\Browser;

use App\Models\Usuario;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
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
    public function testLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->screenshot('login/login-telalogin')
                ->type('usuario_id', 1)
                ->screenshot('login/login-loginpreenchido')
                ->press('Submit')
                ->assertPathIs('/')
                ->assertSee('Bem vindo ao SISVendas')
                ->screenshot('login/login-telainicial');
        });
    }

    public function testLogout()
    {
        $this->browse(function ($usuario) {
            $usuario->loginAs(Usuario::find(1))
                ->visit('/')
                ->assertSee('Sair')
                ->screenshot('login/logout-telainicial')
                ->clickLink('Sair')
                ->assertPathIs('/login')
                ->screenshot('login/logout-telalogin');
        });
    }
}
