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
                ->screenshot('login/1-login_telalogin')
                ->type('usuario_id', 1)
                ->screenshot('login/2-login_loginpreenchido')
                ->press('Logar')
                ->assertRouteIs('inicio')
                ->assertSee('Bem vindo ao SISVendas')
                ->screenshot('login/3-login_telainicial');
        });
    }

    public function testLogout()
    {
        $this->browse(function ($usuario) {
            $user = Usuario::find(1);
            $usuario->loginAs($user)
                ->visit('/')
                ->assertSee($user->nome)
                ->screenshot('login/1-logou_menudousuario')
                ->clickLink($user->nome)
                ->assertSee('Sair')
                ->screenshot('login/2-logout_botaosair')
                ->clickLink('Sair')
                ->assertRouteIs('login')
                ->screenshot('login/3-logout_telalogin');

        });
    }
}
