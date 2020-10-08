<?php

namespace Tests\Feature;

use App\Models\Usuario;
use Database\Seeders\DatabaseTesteSeeder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UsuarioAtualizacaoTest extends TestCase
{
    use RefreshDatabase;

    private function seeds() {
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

    public function testUsuarioNaoAutenticadoNaoAcessaQualquerPerfil() {
        $this->seeds();
        $response = $this->get('usuarios/perfil/1');
        $response->assertStatus(302)
            ->assertRedirect('login');
    }

    public function testUsuarioAutenticadoNivelUmNaoAcessaPerfilDiferenteDoSeu() {
        $this->seeds();
        $usuarioNivelUm = $this->usuarioNivelUm();
        $usuarioDiferente = Usuario::where('id', '!=', $usuarioNivelUm->id)->first();
        $usuario = Auth::loginUsingId($usuarioNivelUm->id);
        $response = $this->actingAs($usuario)
            ->get('usuarios/perfil/'.$usuarioDiferente);
        $response->assertStatus(403);
    }

    public function testUsuarioAutenticadoNivelUmAcessaSeuProprioPerfil() {
        $this->seeds();
        $usuarioNivelUm = $this->usuarioNivelUm();
        $usuario = Auth::loginUsingId($usuarioNivelUm->id);
        $response = $this->actingAs($usuario)
            ->get('usuarios/perfil/'.Auth::id());
        $response->assertStatus(200);
    }

    public function testUsuarioAutenticadoNivelDoisAcessaQualquerPerfil() {
        $this->seeds();
        $usuarioNivelDois = $this->usuarioNivelDois();
        $usuarioDiferente = Usuario::where('id', '!=', $usuarioNivelDois->id)->first();
        $usuario = Auth::loginUsingId($usuarioNivelDois->id);
        $response = $this->actingAs($usuario)
            ->get('usuarios/perfil/'.$usuarioDiferente->id);
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
        $usuarioNivelUm = $this->usuarioNivelUm();
        $usuarioDiferente = Usuario::where('id', '!=', $usuarioNivelUm->id)->first();
        $usuario = Auth::loginUsingId($usuarioNivelUm->id);
        $response = $this->actingAs($usuario)
            ->get('usuarios/editar/'.$usuarioDiferente->id);
        $response->assertStatus(403);
    }

    public function testUsuarioAutenticadoNivelUmAcessaSuaPropriaPagDeEdicao() {
        $this->seeds();
        $usuarioNivelUm = $this->usuarioNivelUm();
        $usuario = Auth::loginUsingId($usuarioNivelUm->id);
        $response = $this->actingAs($usuario)
            ->get('usuarios/editar/'.Auth::id());
        $response->assertStatus(200);
    }

    public function testUsuarioAutenticadoNivelDoisAcessaPagDeEdicaoDeQualquerUsuario() {
        $this->seeds();
        $usuarioNivelDois = $this->usuarioNivelDois();
        $usuarioDiferente = Usuario::where('id', '!=', $usuarioNivelDois->id)->first();
        $usuario = Auth::loginUsingId($usuarioNivelDois->id);
        $response = $this->actingAs($usuario)
            ->get('usuarios/editar/'.$usuarioDiferente->id);
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
        $usuarioNivelUm = $this->usuarioNivelUm();
        $usuarioDiferente = Usuario::where('id', '!=', $usuarioNivelUm->id)->first();
        $dados = $usuarioDiferente->toArray();
        $dados['nome'] = 'Nome alterado';
        $usuario = Auth::loginUsingId($usuarioNivelUm->id);
        $response = $this->actingAs($usuario)
            ->post('usuarios/atualizar/'.$usuarioDiferente->id, $dados);
        $response->assertStatus(403);
    }

    public function testUsuarioAutenticadoNivelUmAtualizaSeusPropriosDados() {
        $this->seeds();
        $usuarioNivelUm = $this->usuarioNivelUm();
        $dados = $usuarioNivelUm->toArray();
        $dados['nome'] = 'Nome alterado';
        $usuario = Auth::loginUsingId($usuarioNivelUm->id);
        $response = $this->actingAs($usuario)
            ->post('usuarios/atualizar/'.$usuarioNivelUm->id, $dados);
        $response->assertStatus(200);
    }

    public function testUsuarioAutenticadoNivelDoisAtualizaDadosDeQualquerUsuario() {
        $this->seeds();
        $usuarioNivelDois = $this->usuarioNivelDois();
        $usuarioDiferente = Usuario::where('id', '!=', $usuarioNivelDois->id)->first();
        $dados = $usuarioDiferente->toArray();
        $dados['nome'] = 'Nome alterado';
        $usuario = Auth::loginUsingId($usuarioNivelDois->id);
        $response = $this->actingAs($usuario)
            ->post('usuarios/atualizar/'.$usuarioDiferente->id, $dados);
        $response->assertStatus(200);
    }
}
