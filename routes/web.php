<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    Pessoa\PessoaController,
    Pessoa\PessoaEnderecoController,
    Pessoa\PessoaContaController,
    Pessoa\PessoaContatoController,
    Pessoa\PessoaDocumentoController,
    Usuario\UsuarioController,
    Convite\ConviteController
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
    if (auth()->check())
        return redirect()->route('meus_dados');
    return redirect()->route('login');
});

Route::get('/modeloemail', function(){
    return view('_template.email.base_email');
});

Route::get('/testeconvite', [ConviteController::class, 'teste']);

Route::prefix('/convite')
    ->group(function(){
        Route::get('/{codigoDoConvite}/{emailDoConvidado}', [ConviteController::class, 'queroParticipar'])->name('convite.quero_participar');
        Route::post('/cadastro-basico', [PessoaController::class, 'adicionaDadosBasicosPost'])->name('convite.cadastro_basico.store');
    }
);

Route::prefix('/')
    ->group(function(){
        Route::get('login', function(){
            return view('usuario.login');
        })->name('usuario.login');
        Route::post('/login', [UsuarioController::class, 'login'])->name('login');
        Route::get('/logout', [UsuarioController::class, 'logout'])->name('logout');
        Route::get('esqueci-minha-senha', [UsuarioController::class, 'esqueciMinhaSenha'])->name('esqueci_minha_senha');
        Route::post('esqueci-minha-senha', [UsuarioController::class, 'iniciarProcessoDeRecuperacaoDeConta'])->name('esqueci_minha_senha.post');
    }
);

Route::middleware(['auth'])
    ->prefix('/')
    ->group(function(){
        Route::prefix('/convite')
            ->group(function(){
                Route::get('/', function(){
                    return redirect()->route('convite.convidar');
                });
                Route::get('/enviar', [ConviteController::class, 'convidar'])->name('convite.convidar');
                Route::post('/enviar', [ConviteController::class, 'convidarPost'])->name('convite.convidar.store');
            }
        );

        Route::get('/email', function () {
            return view('convite.emails.convite');
        });

        Route::prefix('/meus-dados')
            ->group(function(){
                Route::get('/', [PessoaController::class, 'meusDados'])->name('meus_dados');
                Route::get('/altera', [PessoaController::class, 'alteraPessoa'])->name('meus_dados.altera');
                Route::post('/altera/{pessoa}', [PessoaController::class, 'alteraPessoaPost'])->name('meus_dados.altera.store');

                Route::prefix('/documento')
                    ->group(function(){
                        Route::get('/adiciona', [PessoaDocumentoController::class, 'adicionaDocumento'])->name('meus_dados.adiciona_documento');
                        Route::post('/adiciona', [PessoaDocumentoController::class, 'adicionaDocumentoPost'])->name('meus_dados.adiciona_documento.store');
                        Route::get('/altera/{pessoaDocumento}', [PessoaDocumentoController::class, 'alteraDocumento'])->name('meus_dados.altera_documento');
                        Route::post('/altera/{pessoaDocumento}', [PessoaDocumentoController::class, 'alteraDocumentoPost'])->name('meus_dados.altera_documento.store');
                    }
                );

                Route::prefix('/endereco')
                    ->group(function(){
                        Route::get('/adiciona', [PessoaEnderecoController::class, 'adicionaEndereco'])->name('meus_dados.adiciona_endereco');
                        Route::post('/adiciona', [PessoaEnderecoController::class, 'adicionaEnderecoPost'])->name('meus_dados.adiciona_endereco.store');
                        Route::get('/altera/{pessoaEndereco}', [PessoaEnderecoController::class, 'alteraEndereco'])->name('meus_dados.altera_endereco');
                        Route::post('/altera/{pessoaEndereco}', [PessoaEnderecoController::class, 'alteraEnderecoPost'])->name('meus_dados.altera_endereco.store');
                    }
                );

                Route::prefix('/conta')
                    ->group(function(){
                        Route::get('/adiciona', [PessoaContaController::class, 'adicionaConta'])->name('meus_dados.adiciona_conta');
                        Route::post('/adiciona', [PessoaContaController::class, 'adicionaContaPost'])->name('meus_dados.adiciona_conta.store');
                        Route::get('/altera/{conta}', [PessoaContaController::class, 'alteraConta'])->name('meus_dados.altera_conta');
                        Route::post('/altera/{conta}', [PessoaContaController::class, 'alteraContaPost'])->name('meus_dados.altera_conta.store');
                    }
                );

                Route::prefix('/contato')
                    ->group(function(){
                        Route::get('/adiciona', [PessoaContatoController::class, 'adicionaContato'])->name('meus_dados.adiciona_contato');
                        Route::post('/adiciona', [PessoaContatoController::class, 'adicionaContatoPost'])->name('meus_dados.adiciona_contato.store');
                        Route::get('/altera/{contato}', [PessoaContatoController::class, 'alteraContato'])->name('meus_dados.altera_contato');
                        Route::post('/altera/{contato}', [PessoaContatoController::class, 'alteraContatoPost'])->name('meus_dados.altera_contato.store');
                        Route::delete('/exclui/{contato}', [PessoaContatoController::class, 'excluiContatoPost'])->name('meus_dados.exclui_contato.delete');
                    }
                );

                Route::prefix('/usuario')
                    ->group(function(){
                        Route::get('/alterar-minha-senha', [UsuarioController::class, 'alterarSenha'])->name('usuario.alterar_senha');
                        Route::patch('/alterar-minha-senha', [UsuarioController::class, 'alterarSenhaPost'])->name('usuario.alterar_senha.store');
                    }
                );
            }
        );
    }
);
