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

Route::get('/', function () {return view('bem_vindo');});

Route::get('usuarios', "UsuarioControllerObterTodos@obterTodos");

Route::get('usuarios/novo', "UsuarioControllerNovo@novo");

Route::post('usuarios/adicionar', "UsuarioControllerAdicionar@adicionar");

Route::get('usuarios/editar/{id}', "UsuarioControllerEditar@editar");

Route::post('usuarios/atualizar/{id}', "UsuarioControllerAtualizar@atualizar");

Route::get('usuarios/remover/{id}', "UsuarioControllerRemover@remover");

