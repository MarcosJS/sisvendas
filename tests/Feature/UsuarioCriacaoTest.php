<?php

namespace Tests\Feature;

use App\Models\Usuario;
use Database\Seeders\DatabaseTesteSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UsuarioCriacaoTest extends TestCase
{
    use RefreshDatabase;

    private function dadosDoUsuario() {
        $usuario =  Usuario::factory()->make();
        $dadosUsusario = $usuario->toArray();
        $dadosUsusario['senha'] = '11112222';
        $dadosUsusario['senha_confirmation'] = '11112222';
        $dadosUsusario['funcao'] = 2;
        return $dadosUsusario;
    }

    public function testUsuarioNaoAutenticadoNaoAcessaPaginaInicial()
    {
        $response = $this->get('/');
        $response->assertStatus(302)
            ->assertRedirect('login');
    }

    public function testUsuarioAutenticadoAcessaAPaginaInicial() {
        $this->seed();
        $this->seed(DatabaseTesteSeeder::class);
        $usuario = Usuario::find(1);
        $response = $this
            ->actingAs($usuario)
            ->get('/');
        $response->assertStatus(200);
    }

    public function testUsuarioNaoAutenticadoNaoAcessaPagDeCadastro() {
        $response = $this->get('usuarios/novo');
        $response
            ->assertStatus(302)
        ->assertRedirect('login');
    }

    public function testUsuarioNaoAutenticadoNaoAdicionaUsusario() {
        $response = $this->post('usuarios/adicionar', $this->dadosDoUsuario());
        $response->assertStatus(302)
            ->assertRedirect('login');
    }

    public function testUsuarioNaoAutenticadoNaoAcessaListaDeTodosUsusarios() {
        $response = $this->get('usuarios');
        $response
            ->assertStatus(302)
            ->assertRedirect('login');
    }

    public function testUsuarioNaoAutenticadoNaoRemoveQualquerUsusario() {
        $this->seed();
        $this->seed(DatabaseTesteSeeder::class);
        $response = $this->get('usuarios/remover/2');
        $response
            ->assertStatus(302)
            ->assertRedirect('login');
    }

    public function testUsuarioAutenticadoNivelUmNaoAcessaPagDeCadastro() {
        $this->seed();
        $this->seed(DatabaseTesteSeeder::class);
        $usuario = Usuario::find(3);
        $response = $this
            ->actingAs($usuario)
            ->get('usuarios/novo');
        $response->assertStatus(403);
    }

    public function testUsuarioAutenticadoNivelUmNaoAdicionaQualquerUsuario() {
        $this->seed();
        $this->seed(DatabaseTesteSeeder::class);
        $dados = $this->dadosDoUsuario();
        $usuario = Usuario::find(3);
        $response = $this
            ->actingAs($usuario)
            ->post('usuarios/adicionar', $dados);
        $response->assertStatus(403);
    }

    public function testUsuarioAutenticadoNivelUmNaoAcessaListaDeTodosUsuarios() {
        $this->seed();
        $this->seed(DatabaseTesteSeeder::class);
        $usuario = Usuario::find(3);
        $response = $this
            ->actingAs($usuario)
            ->get('usuarios');
        $response->assertStatus(403);
    }

    public function testUsuarioAutenticadoNivelUmNaoRemoveQualquerUsuario() {
        $this->seed();
        $this->seed(DatabaseTesteSeeder::class);
        $usuario = Usuario::find(3);
        $response = $this
            ->actingAs($usuario)
            ->get('usuarios/remover/2');
        $response->assertStatus(403);
    }

    public function testUsuarioAutenticadoNivelDoisAcessaListaDeTodosUsuarios() {
        $this->seed();
        $this->seed(DatabaseTesteSeeder::class);
        $usuario = Usuario::find(1);
        $response = $this
            ->actingAs($usuario)
            ->get('usuarios');
        $response->assertStatus(200);
    }

    public function testUsuarioAutenticadoNivelDoisAcessaPagDeCadastro() {
        $this->seed();
        $this->seed(DatabaseTesteSeeder::class);
        $usuario = Auth::loginUsingId(1);
        $response = $this->get('usuarios/novo');
        $response->assertStatus(200);
    }

    public function testUsuarioAutenticadoNivelDoisAdicionaUsuarioIncorretamente() {
        $this->seed();
        $this->seed(DatabaseTesteSeeder::class);
        $dados = $this->dadosDoUsuario();
        $dados['cpf'] = '';
        $usuario = Usuario::find(1);
        $response = $this
            ->actingAs($usuario)
            ->post('usuarios/adicionar', $dados);
        $response->assertStatus(302)
            ->assertRedirect('usuarios/novo')
            ->assertSessionHasErrors();
    }

    public function testUsuarioAutenticadoNivelDoisAdicionaUsuarioCorretamente() {
        $this->seed();
        $this->seed(DatabaseTesteSeeder::class);
        $dados = $this->dadosDoUsuario();
        $usuario = Usuario::find(1);
        $response = $this
            ->actingAs($usuario)
            ->post('usuarios/adicionar', $dados);
        $response->assertStatus(302)
            ->assertRedirect('usuarios')
            ->assertSessionHasNoErrors();
    }

    public function testUsuarioAutenticadoNivelDoisRemoveQualquerUsuario() {
        $this->seed();
        $this->seed(DatabaseTesteSeeder::class);
        $usuario = Usuario::find(1);
        $response = $this
            ->actingAs($usuario)
            ->get('usuarios/remover/2');
        $response->assertStatus(302)
            ->assertRedirect('usuarios');
    }
}
