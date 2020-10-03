<?php

namespace Tests\Feature;

use App\Http\Middleware\VerificarNivel;
use App\Models\Usuario;
use Database\Seeders\DatabaseTesteSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;

class UsuarioCriacaoTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }

    private function dadosDoUsuario() {
        $usuario =  Usuario::factory()->make();
        $dadosUsusario = $usuario->toArray();
        $dadosUsusario['senha'] = '11112222';
        $dadosUsusario['senha_cofirmation'] = '11112222';
        return $dadosUsusario;
    }

    public function testUsuarioNaoAutenticadoTentaAcessarPagDeCadastro() {
        $response = $this->get('usuarios/novo');
        $response
            ->assertStatus(302)
        ->assertRedirect('login');
    }

    public function testUsuarioNaoAutenticadoTentaAdicionarNovoUsusario() {
        $response = $this->post('usuarios/adicionar', $this->dadosDoUsuario());
        $response->assertStatus(302)
            ->assertRedirect('login');
    }

    public function testUsuarioAutenticadoNivelUmTentaAcessarPagDeCadastro() {
        $this->seed();
        $this->seed(DatabaseTesteSeeder::class);
        $usuario = Usuario::find(3);
        $response = $this
            ->actingAs($usuario)
            ->get('usuarios/novo');
        $response->assertStatus(302)
            ->assertRedirect('/');
    }

    public function testUsuarioAutenticadoNivelUmTentaAdicionarNovoUsuario() {
        $this->seed();
        $this->seed(DatabaseTesteSeeder::class);
        $dados = $this->dadosDoUsuario();
        $usuario = Usuario::find(3);
        $response = $this
            ->actingAs($usuario)
            ->post('usuarios/adicionar', $dados);
        $response->assertStatus(302)
            ->assertRedirect('/');
    }

    public function testUsuarioAutenticadoNivelDoisTentaAcessarPagDeCadastro() {
        $this->seed();
        $this->seed(DatabaseTesteSeeder::class);
        $usuario = Usuario::find(1);
        print_r($usuario->funcao->nivel);
        $response = $this->actingAs($usuario, 'usuario')
            ->get('usuarios/novo');
        $response->assertStatus(200)
            ->assertRedirect('/');
    }
    public function testUsuarioAutenticadoTentaAcessarAPaginaInicial() {
        $this->seed();
        $this->seed(DatabaseTesteSeeder::class);
        $usuario = Usuario::find(1);
        $response = $this
            ->actingAs($usuario)
            ->get('/');
        $response->assertStatus(200);
    }
}
