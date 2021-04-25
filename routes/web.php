<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
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

Route::get('/back', function (){
   return redirect()->back();
})->name('back');

Route::prefix('/usuario')
    ->group(function(){
        Route::get('login', function(){
            return view('usuario.login');
        })->name('usuario.login');
        Route::post('/login', [UsuarioController::class, 'login'])->name('login');
        Route::get('/logout', [UsuarioController::class, 'logout'])->name('logout');
});

Route::middleware(['auth'])
    ->prefix('/meus-dados')
    ->group(function(){
        Route::get('/', [PessoaController::class, 'meusDados'])->name('meus_dados');
        Route::get('/altera', [PessoaController::class, 'alteraPessoa'])->name('meus_dados.altera');
        Route::post('/altera/{pessoa}', [PessoaController::class, 'alteraPessoaPost'])->name('meus_dados.altera.store');

        Route::prefix('/documento')
            ->group(function(){
                Route::get('/adiciona', [PessoaController::class, 'adicionaDocumento'])->name('meus_dados.adiciona_documento');
                Route::post('/adiciona', [PessoaController::class, 'adicionaDocumentoPost'])->name('meus_dados.adiciona_documento.store');
                Route::get('/altera/{doumento}', [PessoaController::class, 'alteraDocumento'])->name('meus_dados.altera_documento');
                Route::post('/altera/{documento}', [PessoaController::class, 'alteraDocumentoPost'])->name('meus_dados.altera_documento.store');
            }
        );

        Route::get('/endereco/altera/{endereco}', [PessoaController::class, 'alteraEndereco'])->name('meus_dados.altera_endereco');
        Route::post('/endereco/altera/{endereco}', [PessoaController::class, 'alteraEnderecoPost'])->name('meus_dados.altera_endereco.store');

        Route::get('/conta/adiciona', [PessoaController::class, 'adicionaConta'])->name('meus_dados.adiciona_conta');
        Route::post('/conta/adiciona', [PessoaController::class, 'adicionaContaPost'])->name('meus_dados.adiciona_conta.store');

        Route::get('/conta/altera/{conta}', [PessoaController::class, 'alteraConta'])->name('meus_dados.altera_conta');
        Route::post('/conta/altera/{conta}', [PessoaController::class, 'alteraContaPost'])->name('meus_dados.altera_conta.store');

        Route::get('/contato/adiciona', [PessoaController::class, 'adicionaContato'])->name('meus_dados.adiciona_contato');
        Route::post('/contato/adiciona', [PessoaController::class, 'adicionaContatoPost'])->name('meus_dados.adiciona_contato.store');

        Route::get('/contato/altera', [PessoaController::class, 'alteraContato'])->name('meus_dados.altera_contato');
        Route::post('/contato/altera', [PessoaController::class, 'alteraContatoPost'])->name('meus_dados.altera_contato.store');

        Route::get('/documento/remove', [PessoaController::class, 'deletaTodosOsDocumentos']);
    }
);
