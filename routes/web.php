<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\SchoolsController;
use App\Http\Controllers\MyAuthController;
use App\Http\Controllers\OneTeacherController;
use App\Http\Controllers\FcmController;
use App\Http\Middleware\AdminOnly;




//Ahmad rasheed 3
//login

// Route::get('/login', function () {
//     return view('auth.login');
// });
Route::get('/login/{fcmToken?}',[MyAuthController::class,'login'])->name('login');
//Route::get('/',[MyAuthController::class,'login'])->name('login');
Route::post('/login/{fcmToken?}',[MyAuthController::class,'authenticate'])->name('authenticate');
Route::get('/logout',[MyAuthController::class,'logout'])->name('logout');

// for a teacher 
Route::get('/show/teacher',[OneTeacherController::class,'show'])->name('showOneTeacher')
    ->middleware('teacher');

Route::put('/update/{id}',[OneTeacherController::class,'update'])->name('updateOneTeacher')
    ->middleware('teacher');


// admin activities
Route::resource('teachers',TeachersController::class)->middleware('admin');

Route::resource('schools',SchoolsController::class)->middleware('admin');

Route::get('/fcm/{id}',[FcmController::class,'view'])->name('fcm.view');
Route::post('/fcm/{id}',[FcmController::class,'send'])->name('fcm.send');


//for handling auto completions select dropdown menu
Route::get('ajax-autocomplete-search', [TeachersController::class,'selectSearch']);

Route::get('/fcm', function () {

    $SERVER_API_KEY = 'AAAAURz1GmI:APA91bGWe5fpl9Gfnf3hxSJ3boq79RghLmazpwCwYUABr-7mo_Jc2tpvATwwEbqo_sqWYm9uWG6ELRRDL-QTvelnDWdD-nNzWdDQJuiWkz21os0dE_ybR7_LEfnK_G1b-bqQajdldk_I';

    $token_1 = 'eCk2GwBMSOqOgWkfcHXGlz:APA91bH9pa8b_DeCBsQ_6ZmqZBzvIDutWAdwWxf1BL9t0mtIGJTAJRY5im43SMoGHn3ocUHpsYw4BLeZsRKUWhuLHI2HLqszWP1Br1UiScaIoXZDQPM_1wJv04-OyPDH1sTU2ruSIte1';

    $data = [

        "registration_ids" => [
            $token_1
        ],

        "notification" => [

            "title" => 'Welcome',

            "body" => 'Description',

            "sound"=> "default" // required for sound on ios

        ],

    ];

    $dataString = json_encode($data);

    $headers = [

        'Authorization: key=' . $SERVER_API_KEY,

        'Content-Type: application/json',

    ];

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');

    curl_setopt($ch, CURLOPT_POST, true);

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

    $response = curl_exec($ch);

    dd($response);

});

