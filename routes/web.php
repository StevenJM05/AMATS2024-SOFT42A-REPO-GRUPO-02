<?php

use App\Http\Controllers\ImpuestosController;
use Illuminate\Support\Facades\Route;

//Rutas para impuestos
Route::get('/impuestos', [ImpuestosController::class, 'index'])->name('impuestos.index');
Route::post('/impuestos', [ImpuestosController::class, 'store'])->name('impuestos.store');
Route::put('/impuestos/{id}', [ImpuestosController::class, 'update'])->name('impuestos.update');
Route::delete('/impuestos/{id}', [ImpuestosController::class, 'destroy'])->name('impuestos.destroy');