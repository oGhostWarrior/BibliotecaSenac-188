<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\AutorController;


//Rota de Produtos
Route::resource('livros', LivroController::class);
Route::resource('fornecedors', FornecedorController::class);
Route::resource('autors', AutorController::class);
Route::get('/autores/{autor}', [AutorController::class, 'show'])->name('autores.show');

//Rota de Login
Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');