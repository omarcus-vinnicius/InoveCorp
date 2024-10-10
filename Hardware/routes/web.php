<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/home', [HomeController::class, 'create'])->name('home-create');
    Route::delete('/home/{id}', [HomeController::class, 'destroy'])->name('destroy');
    Route::get('/home/edit/{id}', [HomeController::class, 'getId'])->name('home-edit');
    Route::put('/home/put/{id}', [HomeController::class, 'updates'])->name('home-update');
});
