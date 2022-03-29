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


//for handling auto completions select dropdown menu
Route::get('ajax-autocomplete-search', [TeachersController::class,'selectSearch']);

Route::get('/fcm', function () {


    $SERVER_API_KEY = 'AAAAURz1GmI:APA91bGWe5fpl9Gfnf3hxSJ3boq79RghLmazpwCwYUABr-7mo_Jc2tpvATwwEbqo_sqWYm9uWG6ELRRDL-QTvelnDWdD-nNzWdDQJuiWkz21os0dE_ybR7_LEfnK_G1b-bqQajdldk_I';

    $token_1 = 'f8_M3hRlRwaJhue_VKbvfH:APA91bGDZpNCVaKDPgOtSyWl15dpN5MJmI-9lHRF6P7B1pzK9WhzVHP7DHQs8SW8q5Vd4NWIwwJC2RV9dh34Dh_YxGDFkFt4ZUOvriw3wgH58StUj-LmOQ64vSCJkOdFV-45M6Eqondu';

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