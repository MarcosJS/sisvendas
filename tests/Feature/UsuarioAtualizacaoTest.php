<?php

namespace Tests\Feature;

use App\Models\Usuario;
use Database\Seeders\DatabaseTesteSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UsuarioAtualizacaoTest extends TestCase
{
    use RefreshDatabase;

    public function seeds() {
        $this->seed();
        $this->seed(DatabaseTesteSeeder::class);
    }

    public function testUsuarioNaoAutenticadoNaoAcessaQualquerPerfil() {
        $this->seeds();
        $response = $this->get('usuarios/perfil/1');
        $response->assertStatus(302)
            ->assertRedirect('login');
    }

    public function testUsuarioAutenticadoNivelUmNaoAcessaPerfilDiferenteDoSeu() {
        $this->seeds();
        $usuario = Auth::loginUsingId(3);
        $response = $this->actingAs($usuario)
            ->get('usuarios/perfil/1');
        $response->assertStatus(403);
    }

    public function testUsuarioAutenticadoNivelUmAcessaSeuProprioPerfil() {
        $this->seeds();
        $usuario = Auth::loginUsingId(3);
        $response = $this->actingAs($usuario)
            ->get('usuarios/perfil/3');
        $response->assertStatus(200);
    }

    public function testUsuarioAutenticadoNivelDoisAcessaQualquerPerfil() {
        $this->seeds();
        $usuario = Auth::loginUsingId(1);
        $response = $this->actingAs($usuario)
            ->get('usuarios/perfil/3');
        $response->assertStatus(200);
    }

    public function testUsuarioNaoAutenticadoNaoAcessaPagDeEdicaoDeUsuario() {
        $this->seeds();
        $response = $this->get('usuarios/editar/1');
        $response->assertStatus(302)
            ->assertRedirect('login');
    }

    public function testUsuarioAutenticadoNivelUmNaoAcessaPagDeEdicaoDeOutroUsuario() {
        $this->seeds();
        $usuario = Auth::loginUsingId(3);
        $response = $this->actingAs($usuario)
            ->get('usuarios/editar/2');
        $response->assertStatus(403);
    }

    public function testUsuarioAutenticadoNivelUmAcessaPagDeEdicaoDosSeusPropriosDados() {
        $this->seeds();
        $usuario = Auth::loginUsingId(3);
        $response = $this->actingAs($usuario)
            ->get('usuarios/editar/3');
        $response->assertStatus(200);
    }

    public function testUsuarioAutenticadoDoisAcessaPagDeEdicaoDeQualquerUsuario() {
        $this->seeds();
        $usuario = Auth::loginUsingId(1);
        $response = $this->actingAs($usuario)
            ->get('usuarios/editar/2');
        $response->assertStatus(200);
    }

    public function testUsuarioNaoAutenticadoNaoAtualizaQualquerUsuario() {
        $this->seeds();
        $dados = Usuario::find(1);
        $dados = $dados->toArray();
        $dados['nome'] = 'Nome alterado';
        $response = $this->post('usuarios/atualizar/1', $dados);
        $response->assertStatus(302)
            ->assertRedirect('login');
    }

    public function testUsuarioAutenticadoNivelUmNaoAtualizaOutroUsuario() {
        $this->seeds();
        $dados = Usuario::find(1);
        $dados = $dados->toArray();
        $dados['nome'] = 'Nome alterado';
        $usuario = Auth::loginUsingId(3);
        $response = $this->actingAs($usuario)
            ->post('usuarios/atualizar/1', $dados);
        $response->assertStatus(403);
    }

    public function testUsuarioAutenticadoNivelUmAtualizaSeusPropriosDados() {
        $this->seeds();
        $dados = Usuario::find(3);
        $dados = $dados->toArray();
        $dados['nome'] = 'Nome alterado';
        $usuario = Auth::loginUsingId(3);
        $response = $this->actingAs($usuario)
            ->post('usuarios/atualizar/3', $dados);
        $response->assertStatus(200);
    }

    public function testUsuarioAutenticadoNivelDoisAtualizaDadosDeQualquerUsuario() {
        $this->seeds();
        $dados = Usuario::find(3);
        $dados = $dados->toArray();
        $dados['nome'] = 'Nome alterado';
        $usuario = Auth::loginUsingId(1);
        $response = $this->actingAs($usuario)
            ->post('usuarios/atualizar/3', $dados);
        $response->assertStatus(200);
    }
}
