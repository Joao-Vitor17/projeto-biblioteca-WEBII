<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AlunoMiddleware;
use App\Http\Middleware\HomeMiddleware;
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
});

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::prefix('home')->group(function () {
        Route::resource('/categorias', CategoriaController::class);
    });
    // Route::get('/home', function () {
    //     return view('dashboard-admin');
    // })->name('home');
});

Route::middleware(['auth', AlunoMiddleware::class])->group(function () {
    // Route::get('/home', function () {
    //     return view('dashboard-aluno');
    // })->name('home');
});

Route::get('/home', function () {
    // esse retorno nunca será usado, o middleware intercepta
})->middleware(['auth', HomeMiddleware::class])->name('home');

require __DIR__.'/auth.php';
