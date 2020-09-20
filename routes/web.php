<?php

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

Route::get('/', function () {return view('inicio');});

Route::get('usuarios', "UsuarioControllerTodos@obterTodos");
Route::get('usuarios/perfil/{id}', "UsuarioControllerAcessar@acessar");
Route::get('usuarios/novo', "UsuarioControllerNovo@novo");
Route::post('usuarios/adicionar', "UsuarioControllerAdicionar@adicionar");
Route::get('usuarios/editar/{id}', "UsuarioControllerEditar@editar");
Route::post('usuarios/atualizar/{id}', "UsuarioControllerAtualizar@atualizar");
Route::get('usuarios/remover/{id}', "UsuarioControllerRemover@remover");

Route::get('clientes', "ClienteControllerTodos@obterTodos");
Route::get('clientes/novo', "ClienteControllerNovo@novo");
Route::post('clientes/adicionar', "ClienteControllerAdicionar@adicionar");
Route::get('clientes/editar/{id}', "ClienteControllerEditar@editar");
Route::post('clientes/atualizar/{id}', "ClienteControllerAtualizar@atualizar");
Route::get('clientes/remover/{id}', "ClienteControllerRemover@remover");

Route::get('produtos', "ProdutoControllerTodos@obterTodos");
Route::get('produtos/novo', "ProdutoControllerNovo@novo");
Route::post('produtos/adicionar', "ProdutoControllerAdicionar@adicionar");
Route::get('produtos/editar/{id}', "ProdutoControllerEditar@editar");
Route::post('produtos/atualizar/{id}', "ProdutoControllerAtualizar@atualizar");
Route::get('produtos/remover/{id}', "ProdutoControllerRemover@remover");

Route::get('sisvendaspdv', function () {return view('sisvendaspdv');});

Route::get('sisvendaspdvitens', "VendaItemPDVControllerTodos@obterTodos");
Route::post('sisvendaspdvitens/adicionar', "VendaItemPDVControllerAdicionar@adicionar");
Route::get('sisvendaspdvitens/cancelar', "VendaItemPDVControllerCancelar@cancelar");
Route::get('sisvendaspdvpagamento', "VendasPDVPagamentoControllerPreparar@preparar");
Route::post('sisvendaspdvrevisao', "VendasPDVRevisaoControllerRevisar@revisar");
Route::post('sisvendaspdvregistro', "VendasPDVRegistroControllerRegistrar@registrar");

