<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\AutorLivroController;
use App\Http\Controllers\EmprestimoController;
use App\Http\Controllers\GerarEmprestimoController;
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
        Route::resource('/autores', AutorController::class);
        Route::resource('/livros', LivroController::class);
        Route::get('/autor-livro/create', [AutorLivroController::class, 'create'])->name('autor-livro.create');
        Route::post('/autor-livro/create', [AutorLivroController::class, 'store'])->name('autor-livro.store');
        Route::get('/emprestimos-alunos', [GerarEmprestimoController::class, 'alunosEmitirPdf'])->name('emprestimos.alunos');
    });
    // Route::get('/home', function () {
    //     return view('dashboard-admin');
    // })->name('home');
});

Route::middleware(['auth', AlunoMiddleware::class])->group(function () {
    Route::prefix('home')->group(function () {
        Route::resource('/emprestimos', EmprestimoController::class);
        Route::get('/visualizar-livros', [LivroController::class, 'index'])->name('livros.listar');
        Route::get('/visualizar-livros/{id}', [LivroController::class, 'show'])->name('livros.mostrar');
        Route::get('/emprestimos-pdf', [GerarEmprestimoController::class, 'emitirPdf'])->name('emprestimos.emitir');
    });
    // Route::get('/home', function () {
    //     return view('dashboard-aluno');
    // })->name('home');
});

Route::get('/home', function () {
    // esse retorno nunca será usado, o middleware intercepta
})->middleware(['auth', HomeMiddleware::class])->name('home');

require __DIR__.'/auth.php';
