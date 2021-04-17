<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    Endereco\PaisController,
    Endereco\EstadoController,
    Endereco\CidadeController,
    Banco\BancoController,
    Pessoa\PessoaController,
    Usuario\UsuarioController
};

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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/Banco', function (){
   return view('Banco.index');
});

Route::prefix('/usuario')
    ->group(function(){
        Route::get('login', function(){
            return view('login');
        })->name('usuario.login');
        Route::post('/login', [UsuarioController::class, 'login'])->name('login');
        Route::get('/logout', [UsuarioController::class, 'logout'])->name('logout');
});

Route::middleware(['auth'])
    ->prefix('/admin')
    ->group(function(){
        Route::resource('/banco', BancoController::class);
        Route::resource('/endereco/pais', PaisController::class);
        Route::resource('/endereco/estado', EstadoController::class);
        Route::resource('/endereco/cidade', CidadeController::class);
        Route::resource('/pessoa', PessoaController::class);
});

Route::middleware(['auth'])
    ->prefix('meus-dados')
    ->group(function(){
        Route::get('/', [PessoaController::class, 'meusDados'])->name('meus_dados');
        Route::get('/documento/adiciona', [PessoaController::class, 'adicionaDocumento'])->name('meus_dados.adiciona_documento');
        Route::post('/documento/adiciona', [PessoaController::class, 'adicionaDocumentoPost'])->name('meus_dados.adiciona_documento');
});
