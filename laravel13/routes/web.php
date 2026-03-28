<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('worker.index');
});

Route::get('/index', function () {
    return view('worker.index');
})->name('index')->middleware('auth');

Route::middleware('guest')->controller(AuthController::class)->group(function () {

    Route::get('/register', 'showRegister')->name('show.register');
    Route::get('/login', 'showLogin')->name('show.login');
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::resource('clients', 'App\Http\Controllers\ClientController');
Route::resource('students', 'App\Http\Controllers\StudentController');
