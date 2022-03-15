<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\SchoolsController;

//Ahmad rasheed 3

Route::get('/', function () {
    return view('welcome');
});


Route::resource('teachers',TeachersController::class);

Route::resource('schools',SchoolsController::class);