<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TwoFactorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
})->name('register');



// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {

// });

// Route::get('/two-factor', function () {
//     return view('auth.two-factor');
// });

Route::middleware(['auth'])->group(function () {
    Route::get('/two-factor', [TwoFactorController::class, 'index'])->name('two-factor.index');
    Route::post('/two-factor', [TwoFactorController::class, 'verify'])->name('two-factor.verify');
});

Route::middleware(['auth', 'twofactor'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/home', [HomeController::class, 'create'])->name('home-create');
    Route::delete('/home/{id}', [HomeController::class, 'destroy'])->name('destroy');
    Route::get('/home/edit/{id}', [HomeController::class, 'getId'])->name('home-edit');
    Route::put('/home/put/{id}', [HomeController::class, 'updates'])->name('home-update');
});

Route::get('/logout', [HomeController::class, 'logout'])->name('login.logout');