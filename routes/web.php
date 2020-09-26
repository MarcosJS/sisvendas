<?php

use App\Http\Controllers\Sessao\SessaoControllerDeslogar;
use App\Http\Controllers\Sessao\SessaoControllerLogar;
use App\Http\Controllers\TesteControllerTesteRelBD;
use App\Http\Controllers\Cliente\ClienteControllerAcessar;
use App\Http\Controllers\Cliente\ClienteControllerAdicionar;
use App\Http\Controllers\Cliente\ClienteControllerAtualizar;
use App\Http\Controllers\Cliente\ClienteControllerEditar;
use App\Http\Controllers\Cliente\ClienteControllerNovo;
use App\Http\Controllers\Cliente\ClienteControllerRemover;
use App\Http\Controllers\Cliente\ClienteControllerTodos;
use App\Http\Controllers\Produto\ProdutoControllerAcessar;
use App\Http\Controllers\Produto\ProdutoControllerAdicionar;
use App\Http\Controllers\Produto\ProdutoControllerAtualizar;
use App\Http\Controllers\Produto\ProdutoControllerEditar;
use App\Http\Controllers\Produto\ProdutoControllerNovo;
use App\Http\Controllers\Produto\ProdutoControllerRemover;
use App\Http\Controllers\Produto\ProdutoControllerTodos;
use App\Http\Controllers\Usuario\UsuarioControllerTodos;
use App\Http\Controllers\Usuario\UsuarioControllerAcessar;
use App\Http\Controllers\Usuario\UsuarioControllerAdicionar;
use App\Http\Controllers\Usuario\UsuarioControllerAtualizar;
use App\Http\Controllers\Usuario\UsuarioControllerEditar;
use App\Http\Controllers\Usuario\UsuarioControllerNovo;
use App\Http\Controllers\Usuario\UsuarioControllerRemover;
use App\Http\Controllers\Venda\VendaControllerItens;
use App\Http\Controllers\Venda\VendaControllerNovo;
use App\Http\Controllers\Venda\VendaControllerItensAdicionar;
use App\Http\Controllers\VendaItemPDVControllerCancelar;
use App\Http\Controllers\VendasPDVPagamentoControllerPreparar;
use App\Http\Controllers\VendasPDVRegistroControllerRegistrar;
use App\Http\Controllers\VendasPDVRevisaoControllerRevisar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (Request $request) {return ($request->session()->has('usuario')) ? view('inicio') : view('login');});
Route::post('/logar', [SessaoControllerLogar::class, 'logar']);
Route::get('/deslogar', [SessaoControllerDeslogar::class, 'deslogar']);
Route::get('teste', [TesteControllerTesteRelBD::class, 'relBD']);

Route::get('clientes', [ClienteControllerTodos::class, 'obterTodos']);
Route::get('clientes/perfil/{id}', [ClienteControllerAcessar::class, 'acessar']);
Route::get('clientes/novo', [ClienteControllerNovo::class, 'novo']);
Route::post('clientes/adicionar', [ClienteControllerAdicionar::class, 'adicionar']);
Route::get('clientes/editar/{id}', [ClienteControllerEditar::class, 'editar']);
Route::post('clientes/atualizar/{id}', [ClienteControllerAtualizar::class, 'atualizar']);
Route::get('clientes/remover/{id}', [ClienteControllerRemover::class, 'remover']);

Route::get('usuarios', [UsuarioControllerTodos::class, 'obterTodos']);
Route::get('usuarios/perfil/{id}', [UsuarioControllerAcessar::class, 'acessar']);
Route::get('usuarios/novo', [UsuarioControllerNovo::class, 'novo']);
Route::post('usuarios/adicionar', [UsuarioControllerAdicionar::class, 'adicionar']);
Route::get('usuarios/editar/{id}', [UsuarioControllerEditar::class, 'editar']);
Route::post('usuarios/atualizar/{id}', [UsuarioControllerAtualizar::class, 'atualizar']);
Route::get('usuarios/remover/{id}', [UsuarioControllerRemover::class, 'remover']);

Route::get('produtos', [ProdutoControllerTodos::class, 'obterTodos']);
Route::get('produtos/perfil/{id}', [ProdutoControllerAcessar::class, 'acessar']);
Route::get('produtos/novo', [ProdutoControllerNovo::class, 'novo']);
Route::post('produtos/adicionar', [ProdutoControllerAdicionar::class, 'adicionar']);
Route::get('produtos/editar/{id}', [ProdutoControllerEditar::class, 'editar']);
Route::post('produtos/atualizar/{id}', [ProdutoControllerAtualizar::class, 'atualizar']);
Route::get('produtos/remover/{id}', [ProdutoControllerRemover::class, 'remover']);

Route::get('sisvendaspdv', function () {return view('sisvendaspdv');});

Route::get('vendas/novo', [VendaControllerNovo::class, 'novo']);
Route::get('vendas/itens', [VendaControllerItens::class, 'todos']);
Route::post('vendas/itens/adicionar', [VendaControllerItensAdicionar::class, 'adicionarItem']);
Route::get('sisvendaspdvitens/cancelar', [VendaItemPDVControllerCancelar::class, 'cancelar']);
Route::get('sisvendaspdvpagamento', [VendasPDVPagamentoControllerPreparar::class, 'preparar']);
Route::post('sisvendaspdvrevisao', [VendasPDVRevisaoControllerRevisar::class, 'revisar']);
Route::post('sisvendaspdvregistro', [VendasPDVRegistroControllerRegistrar::class, 'registrar']);

