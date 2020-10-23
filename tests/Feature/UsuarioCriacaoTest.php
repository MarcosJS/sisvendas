<?php

namespace Tests\Feature;

use App\Models\Usuario;
use Database\Seeders\DatabaseTesteSeeder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UsuarioCriacaoTest extends TestCase
{
    use RefreshDatabase;

    public function seeds() {
        $this->seed();
        $this->seed(DatabaseTesteSeeder::class);
    }

    private function usuarioNivelUm() {
        return Usuario::whereHas('funcao', function(Builder $query) {
            $query->where('nivel', '=', 1);
        })->first();
    }

    private function usuarioNivelDois() {
        return Usuario::whereHas('funcao', function(Builder $query) {
            $query->where('nivel', '=', 2);
        })->first();
    }

    private function dadosDoUsuario() {
        $usuario =  Usuario::factory()->make();
        $dadosUsusario = $usuario->toArray();
        $dadosUsusario['password'] = '11112222';
        $dadosUsusario['password_confirmation'] = '11112222';
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
        $this->seeds();
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
        $this->seeds();
        $response = $this->get('usuarios/remover/1');
        $response
            ->assertStatus(302)
            ->assertRedirect('login');
    }

    public function testUsuarioAutenticadoNivelUmNaoAcessaPagDeCadastro() {
        $this->seeds();
        $usuarioNivelUm = $this->usuarioNivelUm();
        $response = $this
            ->actingAs($usuarioNivelUm)
            ->get('usuarios/novo');
        $response->assertStatus(403);
    }

    public function testUsuarioAutenticadoNivelUmNaoAdicionaQualquerUsuario() {
        $this->seeds();
        $usuarioNivelUm = $this->usuarioNivelUm();
        $dados = $this->dadosDoUsuario();
        $response = $this
            ->actingAs($usuarioNivelUm)
            ->post('usuarios/adicionar', $dados);
        $response->assertStatus(403);
    }

    public function testUsuarioAutenticadoNivelUmNaoAcessaListaDeTodosUsuarios() {
        $this->seeds();
        $usuarioNivelUm = $this->usuarioNivelUm();
        $response = $this
            ->actingAs($usuarioNivelUm)
            ->get('usuarios');
        $response->assertStatus(403);
    }

    public function testUsuarioAutenticadoNivelUmNaoRemoveQualquerUsuario() {
        $this->seeds();
        $usuarioNivelUm = $this->usuarioNivelUm();
        $usuarioDiferente = Usuario::where('id', '!=', $usuarioNivelUm->id)->first();
        $response = $this
            ->actingAs($usuarioNivelUm)
            ->get('usuarios/remover/'.$usuarioDiferente->id);
        $response->assertStatus(403);
    }

    public function testUsuarioAutenticadoNivelDoisAcessaListaDeTodosUsuarios() {
        $this->seeds();
        $usuarioNivelDois = $this->usuarioNivelDois();
        $response = $this
            ->actingAs($usuarioNivelDois)
            ->get('usuarios');
        $response->assertStatus(200);
    }

    public function testUsuarioAutenticadoNivelDoisAcessaPagDeCadastro() {
        $this->seeds();
        $usuarioNivelDois = $this->usuarioNivelDois();
        $usuario = Auth::loginUsingId($usuarioNivelDois->id);
        $response = $this
            ->actingAs($usuario)
            ->get('usuarios/novo');
        $response->assertStatus(200);
    }

    public function testUsuarioAutenticadoNivelDoisAdicionaUsuarioIncorretamente() {
        $this->seeds();
        $dados = $this->dadosDoUsuario();
        $dados['cpf'] = '';
        $usuarioNivelDois = $this->usuarioNivelDois();
        $response = $this
            ->from('usuarios/novo')
            ->actingAs($usuarioNivelDois)
            ->post('usuarios/adicionar', $dados);
        $response->assertStatus(302)
            ->assertRedirect('usuarios/novo')
            ->assertSessionHasErrors();
    }

    public function testUsuarioAutenticadoNivelDoisAdicionaUsuarioCorretamente() {
        $this->seeds();
        $dados = $this->dadosDoUsuario();
        $usuarioNivelDois = $this->usuarioNivelDois();
        $response = $this
            ->from('usuarios/novo')
            ->actingAs($usuarioNivelDois)
            ->post('usuarios/adicionar', $dados);
        $response->assertStatus(302)
            ->assertRedirect('usuarios')
            ->assertSessionHasNoErrors();
    }

    public function testUsuarioAutenticadoNivelDoisRemoveQualquerUsuario() {
        $this->seeds();
        $usuarioNivelDois = $this->usuarioNivelDois();
        $usuarioDiferente = Usuario::where('id', '!=', $usuarioNivelDois->id)->first();
        $response = $this
            ->actingAs($usuarioNivelDois)
            ->get('usuarios/remover/'.$usuarioDiferente->id);
        $response->assertStatus(302)
            ->assertRedirect('usuarios');
    }
}
