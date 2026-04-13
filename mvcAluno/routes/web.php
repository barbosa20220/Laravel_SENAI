<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BibliotecaController;
use App\Http\Controllers\ImpostoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/biblioteca/listar',[BibliotecaController::class, 'listar'])->name('biblioteca.listar');

Route::get('/biblioteca/cadastrar', function(){return view('cadastro');})->name('biblioteca.cadastro');

Route::post('/biblioteca/salvar',[BibliotecaController::class, 'add'])->name('biblioteca.salvar');

Route::get('/biblioteca/{id}/atualizar', [BibliotecaController::class, 'atualizar'])->name('biblioteca.atualizar');

Route::put('/biblioteca/{id}/update',[BibliotecaController::class, 'update'])->name('biblioteca.update');

Route::delete('/biblioteca/{id}', [BibliotecaController::class, 'deletar'])->name('biblioteca.deletar');

Route::get('/imposto/cadastrar', function(){return view('cadastroImposto');})->name('imposto.cadastro');

Route::post('/imposto/salvar',[ImpostoController::class, 'add'])->name('imposto.salvar');