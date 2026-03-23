<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/aluno/listar',[AlunoController::class, 'listar'])->name('aluno.listar');

Route::get('/aluno/cadatrar', function(){
    return view('cadastro');
})->name('aluno.cadastro');

Route::post('/aluno/salvar',[AlunoController::class, 'add'])->name('aluno.salvar');