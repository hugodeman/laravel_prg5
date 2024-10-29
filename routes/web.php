<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChordController;
use App\Http\Controllers\FretController;
use App\Http\Controllers\HomeController;
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
});

Route::get('/home', [HomeController::class, 'index'])->name('home.index');


 Route::patch('/chords/{chord}/status', [ChordController::class, 'updateStatus'])->name('chords.updateStatus');
Route::resource('/chords', ChordController::class);
//Route::post('/chords', [ChordController::class, 'updateStatus'])->name('chords.status-update');


Route::resource('/frets', FretController::class);

Route::resource('/admin', AdminController::class) ->middleware(['auth', 'verified']);

Route::resource('/users', UserController::class);

require __DIR__.'/auth.php';
