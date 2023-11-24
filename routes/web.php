<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ManzanaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/home', [ManzanaController::class, 'index'])->name('home');
    Route::get('/verManzana/{manzana}', [ManzanaController::class, 'show'])->name('verManzana');
    Route::get('/formularioAgregarManzana', [ManzanaController::class, 'create'])->name('agregarManzana');
    Route::post('/agregarManzana', [ManzanaController::class, 'store']);
    Route::get('/modificarManzana', [ManzanaController::class, 'edit'])->name('editarManzana');
    Route::post('/editarManzana/{manzana}', [ManzanaController::class, 'update'])->name('editarManzana');
    Route::delete('/eliminarManzana/{id}', [ManzanaController::class, 'destroy'])->name('eliminarManzana');
});

require __DIR__.'/auth.php';
