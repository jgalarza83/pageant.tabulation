<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\EventCriteriaController;

Route::get('/',[AuthController::class, 'index'])->name('auth.index');
Route::post('/', [AuthController::class, 'login'])->name('auth.login');

Route::resource('event', EventController::class);

Route::get('{event}/contestants', [EventController::class, 'show_contestants'])->name('event.contestants');
Route::get('{event}/{contestant}/score', [EventController::class, 'score'])->name('event.score');
Route::get('/score/recorded', [EventController::class, 'submit'])->name('event.submit');

Route::resource('eventcriteria', EventCriteriaController::class);
// Route::resource('score', ScoreController::class);

Route::post('event/score', [ScoreController::class,'store'])->name('score.store');
Route::post('event', [ScoreController::class,'photogenic'])->name('score.photogenic');

// require __DIR__.'/auth.php';
