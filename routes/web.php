<?php

use App\Http\Controllers\Caixa\CaixaControllerAbrir;
use App\Http\Controllers\Caixa\CaixaControllerAcessar;
use App\Http\Controllers\Caixa\CaixaControllerAdicionarSuprimento;
use App\Http\Controllers\Caixa\CaixaControllerFechar;
use App\Http\Controllers\Caixa\CaixaControllerPagamento;
use App\Http\Controllers\Caixa\CaixaControllerRealizarSangria;
use App\Http\Controllers\Caixa\ControleDeCaixaContollerFiltrar;
use App\Http\Controllers\Caixa\ControleDeCaixaControllerAcessar;
use App\Http\Controllers\Material\MaterialControllerNovo;
use App\Http\Controllers\Material\MateriaPrimaControllerAcessar;
use App\Http\Controllers\Material\MateriaPrimaControllerAdicionar;
use App\Http\Controllers\Material\MateriaPrimaControllerAtualizar;
use App\Http\Controllers\Material\MateriaPrimaControllerEditar;
use App\Http\Controllers\Material\MateriaPrimaControllerFluxoEstoque;
use App\Http\Controllers\Material\MateriaPrimaControllerRegistrarEntrada;
use App\Http\Controllers\Material\MateriaPrimaControllerTodos;
use App\Http\Controllers\Pagamento\ContasAReceberContollerFiltrar;
use App\Http\Controllers\Pagamento\ContasAReceberControllerAcessar;
use App\Http\Controllers\Pagamento\PagamentoControllerExcluir;
use App\Http\Controllers\Pagamento\PagamentoControllerRegistrarCheque;
use App\Http\Controllers\Pagamento\PagamentoControllerRegistrarDinheiro;
use App\Http\Controllers\Pagamento\PagamentoControllerRegistrarVale;
use App\Http\Controllers\Pagamento\ValeControllerExcluir;
use App\Http\Controllers\Produto\Composicao\ComposicaoControllerAdicionarItem;
use App\Http\Controllers\Produto\Composicao\ComposicaoControllerEditar;
use App\Http\Controllers\Produto\Composicao\ComposicaoControllerLimpar;
use App\Http\Controllers\Produto\Composicao\ComposicaoControllerNovo;
use App\Http\Controllers\Produto\Composicao\ComposicaoControllerSalvar;
use App\Http\Controllers\Produto\ProdutoControllerFluxoEstoque;
use App\Http\Controllers\Produto\ProdutoControllerProducaoRegistrar;
use App\Http\Controllers\Sessao\SessaoControllerDeslogar;
use App\Http\Controllers\Sessao\SessaoControllerLogar;
use App\Http\Controllers\TesteControllerTesteRelBD;
use App\Http\Controllers\Cliente\ClienteControllerAcessar;
use App\Http\Controllers\Cliente\ClienteControllerAdicionar;
use App\Http\Controllers\Cliente\ClienteControllerAtualizar;
use App\Http\Controllers\Cliente\ClienteControllerEditar;
use App\Http\Controllers\Cliente\ClienteControllerNovo;
use App\Http\Controllers\Cliente\ClienteControllerRemover;
use App\Http\Controllers\Cliente\ClienteControllerGerarCredito;
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
use App\Http\Controllers\Venda\VendaControllerAcessar;
use App\Http\Controllers\Venda\VendaControllerApagarDadosSecao;
use App\Http\Controllers\Venda\VendaControllerAplicarDesconto;
use App\Http\Controllers\Venda\VendaControllerAtivar;
use App\Http\Controllers\Venda\VendaControllerDesvincularCliente;
use App\Http\Controllers\Venda\VendaControllerIncluirNomeCliente;
use App\Http\Controllers\Venda\VendaControllerItens;
use App\Http\Controllers\Venda\VendaControllerNovo;
use App\Http\Controllers\Venda\VendaControllerItensAdicionar;
use App\Http\Controllers\Venda\VendaControllerItensExcluir;
use App\Http\Controllers\Venda\VendaControllerCancelar;
use App\Http\Controllers\Venda\VendaControllerPDV;
use App\Http\Controllers\Venda\VendaControllerTodos;
use App\Http\Controllers\Venda\VendaControllerVincularCliente;
use App\Http\Controllers\Venda\VendaControllerPagamento;
use App\Http\Controllers\Venda\VendaControllerRegistrar;
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

Route::get('login', function () {return view('login');})->name('login');
Route::post('logar', [SessaoControllerLogar::class, 'logar'])->name('logar');
Route::get('deslogar', [SessaoControllerDeslogar::class, 'deslogar'])->name('deslogar');
Route::get('teste', [TesteControllerTesteRelBD::class, 'relBD']);

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {return view('inicio');})->name('inicio');

    Route::get('clientes', [ClienteControllerTodos::class, 'obterTodos'])->name('clientes');
    Route::get('clientes/acessar/{id}', [ClienteControllerAcessar::class, 'acessar'])->name('cliente');
    Route::get('clientes/novo', [ClienteControllerNovo::class, 'novo'])->name('novocliente');
    Route::post('clientes/adicionar', [ClienteControllerAdicionar::class, 'adicionar'])->name('adicionarcliente');
    Route::get('clientes/editar/{id}', [ClienteControllerEditar::class, 'editar'])->name('editarcliente');
    Route::post('clientes/atualizar/{id}', [ClienteControllerAtualizar::class, 'atualizar'])->name('atualizarcliente');
    Route::get('clientes/remover/{id}', [ClienteControllerRemover::class, 'remover'])->middleware('verificarnivel');
    Route::post('clientes/gerarcredito', [ClienteControllerGerarCredito::class, 'gerarCredito'])->name('gerarcredito');

    Route::middleware('can:isAdmin')->group(function () {
        Route::get('usuarios', [UsuarioControllerTodos::class, 'obterTodos'])->name('usuarios');
        Route::get('usuarios/novo', [UsuarioControllerNovo::class, 'novo']);
        Route::post('usuarios/adicionar', [UsuarioControllerAdicionar::class, 'adicionar'])->name('adicionarusuario');
        Route::get('usuarios/remover/{id}', [UsuarioControllerRemover::class, 'remover']);
    });

    Route::middleware('can:isOwnerOrAdmin,id')->group(function () {
        Route::get('usuarios/acessar/{id}', [UsuarioControllerAcessar::class, 'acessar'])->name('usuario');
        Route::get('usuarios/editar/{id}', [UsuarioControllerEditar::class, 'editar']);
        Route::post('usuarios/atualizar/{id}', [UsuarioControllerAtualizar::class, 'atualizar'])->name('atualizarusuario');
    });

    Route::get('materiais', [MateriaPrimaControllerTodos::class, 'obterTodos'])->name('materiais');
    Route::get('material/acessar/{id}', [MateriaPrimaControllerAcessar::class, 'acessar'])->name('dadosdomaterial');
    Route::get('material/novo', [MaterialControllerNovo::class, 'novo'])->name('novomaterial');
    Route::post('material/adicionar', [MateriaPrimaControllerAdicionar::class, 'adicionar'])->name('adicionarmaterial');
    Route::get('material/editar/{id}', [MateriaPrimaControllerEditar::class, 'editar'])->name('editarmaterial');
    Route::post('material/atualizar/{id}', [MateriaPrimaControllerAtualizar::class, 'atualizar'])->name('atualizarmaterial');
    Route::post('material/registrarentrada/{id}', [MateriaPrimaControllerRegistrarEntrada::class, 'registrar'])->name('registrarentrada');
    Route::get('materiais/fluxodeestoque', [MateriaPrimaControllerFluxoEstoque::class, 'fluxo'])->name('fluxoestoquemateriais');

    Route::get('produtos', [ProdutoControllerTodos::class, 'obterTodos'])->name('produtos');
    Route::get('produto/acessar/{id}', [ProdutoControllerAcessar::class, 'acessar'])->name('dadosdoproduto');
    Route::get('produto/novo', [ProdutoControllerNovo::class, 'novo'])->name('novoproduto');
    Route::post('produto/adicionar', [ProdutoControllerAdicionar::class, 'adicionar'])->name('adicionarproduto');
    Route::get('produto/editar/{id}', [ProdutoControllerEditar::class, 'editar'])->name('editarproduto');
    Route::post('produto/atualizar/{id}', [ProdutoControllerAtualizar::class, 'atualizar'])->name('atualizarproduto');
    Route::post('produto/registrarproducao/{id}', [ProdutoControllerProducaoRegistrar::class, 'registrar'])->name('registrarproducao');
    Route::get('produto/remover/{id}', [ProdutoControllerRemover::class, 'remover'])->name('removerproduto');
    Route::get('produtos/fluxodeestoque', [ProdutoControllerFluxoEstoque::class, 'fluxo'])->name('fluxoestoque');

    Route::get('produto/{id}/composicao/novo', [ComposicaoControllerNovo::class, 'novo'])->name('novacomposicao');
    Route::get('produto/{id}/composicao/editar', [ComposicaoControllerEditar::class, 'editar'])->name('editarcomposicao');
    Route::post('produto/composicao/adicionaritem', [ComposicaoControllerAdicionarItem::class, 'adicionar'])->name('adicionaritemcomposicao');
    Route::get('produto/{id}/composicao/salvarcomposicao', [ComposicaoControllerSalvar::class, 'salvar'])->name('salvarcomposicao');
    Route::get('produto/composicao/limparcomposicao', [ComposicaoControllerLimpar::class, 'limpar'])->name('limparcomposicao');

    Route::get('vendas', [VendaControllerTodos::class, 'obterTodos'])->name('listavendas');
    Route::get('venda/inicio', [VendaControllerPDV::class, 'iniciar'])->name('iniciovendas');
    Route::get('venda/ativar/{id}', [VendaControllerAtivar::class, 'ativar'])->name('ativarvenda');
    Route::get('venda/acessar/{id}', [VendaControllerAcessar::class, 'acessar'])->name('acessarvenda');
    Route::get('venda/itens', [VendaControllerItens::class, 'todos'])->name('itens');
    Route::post('venda/itens/adicionar', [VendaControllerItensAdicionar::class, 'adicionarItem'])->name('adicionaritem');
    Route::get('venda/itens/excluir/{id}', [VendaControllerItensExcluir::class, 'excluirItem'])->name('excluiritem');
    Route::get('venda/cancelar', [VendaControllerCancelar::class, 'cancelar'])->name('cancelar');
    Route::get('venda/pagamento', [VendaControllerPagamento::class, 'pagamento']);
    Route::get('venda/vincularcliente/{id}', [VendaControllerVincularCliente::class, 'vincular'])->name('vincularcliente');
    Route::post('venda/incluirnomecliente', [VendaControllerIncluirNomeCliente::class, 'incluirNome'])->name('incluirnomecliente');
    Route::get('venda/desvincularcliente', [VendaControllerDesVincularCliente::class, 'desvincular'])->name('desvincularcliente');
    Route::post('venda/aplicardescporcetagem', [VendaControllerAplicarDesconto::class, 'aplicarPorcentagem'])->name('aplicardescporcentagem');
    Route::post('venda/aplicardesccifra', [VendaControllerAplicarDesconto::class, 'aplicarCifra'])->name('aplicardesccifra');
    Route::get('venda/registrar', [VendaControllerRegistrar::class, 'registrar'])->name('registrarvenda');
    Route::get('venda/apagardadossecaovenda', [VendaControllerApagarDadosSecao::class, 'apagarDados '])->name('apagardadossecaovenda');

    Route::post('pagamentos/registrarcheque', [PagamentoControllerRegistrarCheque::class, 'registrar'])->name('registrarcheque');
    Route::post('pagamentos/registrardinheiro', [PagamentoControllerRegistrarDinheiro::class, 'registrar'])->name('registrardinheiro');
    Route::post('pagamentos/registrarvale', [PagamentoControllerRegistrarVale::class, 'registrar'])->name('registrarvale');
    Route::get('pagamentos/excluir/{id}', [PagamentoControllerExcluir::class, 'excluir'])->name('excluirpagamento');
    Route::get('vales/excluir/{id}', [ValeControllerExcluir::class, 'excluir'])->name('excluirvale');
    Route::get('contasareceber', [ContasAReceberControllerAcessar::class, 'acessar'])->name('contasareceber');
    Route::post('contasareceber/filtrar', [ContasAReceberContollerFiltrar::class, 'filtrar'])->name('filtrarcontasareceber');

    Route::get('caixa', [CaixaControllerAcessar::class, 'acessar'])->name('caixa');
    Route::get('caixa/controledecaixa', [ControleDeCaixaControllerAcessar::class, 'acessar'])->name('controledecaixa');
    Route::get('caixa/pagamento', [CaixaControllerPagamento::class, 'pagamento'])->name('pagamento');
    Route::get('caixa/abrir', [CaixaControllerAbrir::class, 'abrir'])->name('abrircaixa');
    Route::get('caixa/fechar', [CaixaControllerFechar::class, 'fechar'])->name('fecharcaixa');
    Route::post('caixa/realizarsangria', [CaixaControllerRealizarSangria::class, 'realizarSangria'])->name('realizar_sangria');
    Route::post('caixa/adicionarsuprimento', [CaixaControllerAdicionarSuprimento::class, 'adicionarSuprimento'])->name('adicionar_suprimento');
    Route::post('caixa/controledecaixa/filtrar', [ControleDeCaixaContollerFiltrar::class, 'filtrar'])->name('filtrarcontroledecaixa');
});

