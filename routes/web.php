<?php

use App\Http\Controllers\ChordController;
use App\Http\Controllers\FretController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home.index');

//Route::get('/chords', [ChordController::class, 'index'])->name('chords.index') -> middleware('auth');
//Route::get('/chords/{id}', [ChordController::class, 'show'])->name('chords.show');
//Route::get('/chords/create', [ChordController::class, 'create'])->name('chords.create');
//Route::post('/chords', [ChordController::class, 'store'])->name('chords.store');
Route::resource('/chords', ChordController::class);


Route::resource('/frets', FretController::class);

require __DIR__.'/auth.php';
