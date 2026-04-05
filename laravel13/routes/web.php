<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\BankTransferController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
})->name('index')->middleware('auth');

// Route::get('/clients/dashboard', function () {
//     return view('client.dashboard');
// })->name('clients.dashboard')->middleware('auth');

Route::middleware('guest')->controller(AuthController::class)->group(function () {

    Route::get('/login', 'showLogin')->name('show.login');
    Route::post('/login', 'login')->name('login');
});
// // Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
// // Route::post('/register', [AuthController::class, 'register'])->name('register');

//Route::get('/register/worker', [WorkerController::class, 'create'])->name('show.register.worker');
//Route::post('/register/worker', [WorkerController::class, 'store'])->name('register.worker');

Route::get('/register/worker', [WorkerController::class, 'create'])->name('show.register.worker')->middleware(['auth', 'role:worker,admin']);
Route::post('/register/worker', [WorkerController::class, 'store'])->name('register.worker')->middleware(['auth', 'role:worker,admin']);

//Route::get('/register/client', [ClientController::class, 'create'])->name('show.register.client');
//Route::post('/register/client', [ClientController::class, 'store'])->name('register.client');

Route::get('/register/client', [ClientController::class, 'create'])->name('show.register.client')->middleware(['auth', 'role:worker,admin']);
Route::post('/register/client', [ClientController::class, 'store'])->name('register.client')->middleware(['auth', 'role:worker,admin']);



Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::resource('clients', 'App\Http\Controllers\ClientController');
Route::resource('students', 'App\Http\Controllers\StudentController');
//Route::resource('workers', 'App\Http\Controllers\WorkerController');
Route::resource('workers', 'App\Http\Controllers\WorkerController')->middleware(['auth', 'role:worker,admin']);
Route::resource('admin', 'App\Http\Controllers\AdminController')->middleware(['auth', 'role:admin']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'role:worker,admin']);

Route::middleware(['auth', 'role:worker,admin'])->group(function () {
    Route::get('/bankaccounts', [BankAccountController::class, 'create'])->name('bankaccounts.create');
    Route::post('/bankaccounts', [BankAccountController::class, 'store'])->name('bankaccounts.store');

    Route::get('/clients/{id}', [ClientController::class, 'show']);
});

Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('/dashboard', [ClientController::class, 'dashboard'])
        ->name('clients.dashboard');
});

Route::get('/transfer', [BankTransferController::class, 'create'])->name('transfer.create');

Route::get('/transfer', [BankTransferController::class, 'create'])->name('transfer.create')->middleware(['auth', 'role:client,worker,admin']);
Route::post('/transfer', [BankTransferController::class, 'store'])->name('transfer.store')->middleware(['auth', 'role:client,worker,admin']);

Route::get('/history', [BankTransferController::class, 'history'])->name('transfer.history')->middleware(['auth', 'role:client']);
