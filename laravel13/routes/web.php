<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('clients', 'App\Http\Controllers\ClientController');
Route::resource('students', 'App\Http\Controllers\StudentController');
