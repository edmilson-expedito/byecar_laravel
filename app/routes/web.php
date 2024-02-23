<?php

use App\Http\Controllers\CarrosController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/carros', [CarrosController::class, 'index'])->name('carros.index');
// Route::get('/carros/create', [CarrosController::class, 'create'])->name('carros.create');
// Route::post('/carros', [CarrosController::class, 'store'])->name('carros.store');
// Route::get('/carros/{carro}', [CarrosController::class, 'show'])->name('carros.show');
// Route::get('/carros/{carro}/edit', [CarrosController::class, 'edit'])->name('carros.edit');
// Route::put('/carros/{carro}', [CarrosController::class, 'update'])->name('carros.update');
// Route::delete('/carros/{carro}', [CarrosController::class, 'destroy'])->name('carros.destroy');

Route::resource('carros', CarrosController::class);
