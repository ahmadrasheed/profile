<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeachersController;

//Ahmad rasheed 3

Route::get('/', function () {
    return view('welcome');
});


Route::resource('teachers',TeachersController::class);