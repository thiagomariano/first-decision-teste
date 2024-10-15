<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

    Route::get('/lista', [UserController::class, 'lista'])->name('lista');
    Route::get('/cadastrar', [UserController::class, 'cadastrar'])->name('cadastrar');
    Route::get('/editar/{id}', [UserController::class, 'edit'])->name('edit');
    Route::patch('/update', [UserController::class, 'update'])->name('update');
    Route::post('/store', [UserController::class, 'store'])->name('store');

    Route::get('/delete/{id}', [UserController::class, 'delete'])->name('delete');
});

#rota do teste unitário dem autenticacao
Route::post('/store', [UserController::class, 'store'])->name('store');



require __DIR__.'/auth.php';
