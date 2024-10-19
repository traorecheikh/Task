<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[TaskController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::any('/ajouter',[TaskController::class,'ajouter'])->middleware(['auth', 'verified'])->name('ajouter');
Route::any('/modifier/{task}',[TaskController::class,'modifier'])->middleware(['auth', 'verified'])->name('modifier');
Route::any('/supprimer/{task}',[TaskController::class,'supprimer'])->middleware(['auth', 'verified'])->name('supprimer');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
