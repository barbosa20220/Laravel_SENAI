<?php
use App\Http\Controllers\ProducaoController;

Route::get('/produto/cadastrar', [ProducaoController::class, 'cadastro'])
    ->name('produto.cadastro');
Route::get('/producoes', [ProducaoController::class, 'index']);
Route::get('/producoes/{id}', [ProducaoController::class, 'show']);
Route::post('/producoes', [ProducaoController::class, 'store']);
Route::put('/producoes/{id}', [ProducaoController::class, 'update']);
Route::delete('/producoes/{id}', [ProducaoController::class, 'destroy']);