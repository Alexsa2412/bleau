<?php

use App\Http\Controllers\{
    PessoaController
};
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

Route::any('/pessoas/search', [PessoaController::class, 'search'] )->name('pessoas.search');
Route::get('/pessoas', [PessoaController::class, 'index'] )->name('pessoas.index');
Route::get('/pessoas/create', [PessoaController::class, 'create'] )->name('pessoas.create');
Route::get('/pessoas/{id}', [PessoaController::class, 'show'] )->name('pessoas.show');
Route::post('/pessoas/create', [PessoaController::class, 'store'] )->name('pessoas.store');
Route::get('/pessoas/edit/{id}', [PessoaController::class, 'edit'] )->name('pessoas.edit');
Route::put('/pessoas/{id}', [PessoaController::class, 'update'] )->name('pessoas.update');
Route::get('/pessoas/editdados/{id}', [PessoaController::class, 'edit'] )->name('pessoas.editdados');
Route::put('/pessoas/{id}', [PessoaController::class, 'update'] )->name('pessoas.updatedados');
Route::delete('/pessoas/{id}', [PessoaController::class, 'destroy'] )->name('pessoas.destroy');


Route::get('/', function () {
    return view('welcome');
});
