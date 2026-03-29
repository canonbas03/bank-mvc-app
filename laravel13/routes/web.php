<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WorkerController;
use App\Models\Worker;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/index', function () {
//     return view('index');
// })->name('index')->middleware('auth');

Route::middleware('guest')->controller(AuthController::class)->group(function () {

    Route::get('/login', 'showLogin')->name('show.login');
    Route::post('/login', 'login')->name('login');
});
Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/register/worker', [WorkerController::class, 'create'])->name('show.register.worker');
Route::post('/register/worker', [WorkerController::class, 'store'])->name('register.worker');


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::resource('clients', 'App\Http\Controllers\ClientController');
Route::resource('students', 'App\Http\Controllers\StudentController');
Route::resource('workers', 'App\Http\Controllers\WorkerController');
