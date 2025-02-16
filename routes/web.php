<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TarefaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::get('/dashboard', [TarefaController::class, 'index'])->name('dashboard');

    Route::put('/tarefas/{id}/status', [TarefaController::class, 'updateStatus']);
    Route::get('/create', [TarefaController::class, 'create'])->name('create');
    Route::post('/tarefas', [TarefaController::class, 'store'])->name('tarefas.store');
    Route::put('/tarefas/{id}', [TarefaController::class, 'update'])->name('tarefas.update');
    Route::get('/exclude/{id}', [TarefaController::class, 'destroy'])->name('tarefas.destroy');
    Route::get('/edit', [TarefaController::class, 'edit'])->name('edit');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
