<?php

use App\Http\Controllers\ImpuestosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\CategoriaController;

//Rutas para impuestos
Route::get('/impuestos', [ImpuestosController::class, 'index'])->name('impuestos.index');
Route::post('/impuestos', [ImpuestosController::class, 'store'])->name('impuestos.store');
Route::put('/impuestos/{id}', [ImpuestosController::class, 'update'])->name('impuestos.update');
Route::delete('/impuestos/{id}', [ImpuestosController::class, 'destroy'])->name('impuestos.destroy');

//Rutas de marca
Route::get('/marcas', [MarcaController::class, 'index'])->name('marcas.index');
Route::post('/marcas', [MarcaController::class, 'store'])->name('marcas.store');
Route::put('/marcas/{id}', [MarcaController::class, 'update'])->name('marcas.update');
Route::delete('/marcas/{id}', [MarcaController::class, 'destroy'])->name('marcas.destroy');

//Rutas de categoria
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
Route::put('/categorias/{id}', [CategoriaController::class, 'update'])->name('categorias.update');
Route::delete('/categorias/{id}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');