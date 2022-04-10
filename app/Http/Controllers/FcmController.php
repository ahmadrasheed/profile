<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Teacher;

class FcmController extends Controller
{
    //

    public function view($id)
    {
        $teacher=Teacher::findOrfail($id);
        return view('fcm.fcm',["teacher"=>$teacher]);
    }
    public function send(Request $request, $id)
    {
        $teacher=Teacher::findOrfail($id);
        $body=$request->input('body');
        //dd($teacher->user->fcmToken);

        $SERVER_API_KEY = 'AAAAURz1GmI:APA91bGWe5fpl9Gfnf3hxSJ3boq79RghLmazpwCwYUABr-7mo_Jc2tpvATwwEbqo_sqWYm9uWG6ELRRDL-QTvelnDWdD-nNzWdDQJuiWkz21os0dE_ybR7_LEfnK_G1b-bqQajdldk_I';

        //$token_1 = 'eCk2GwBMSOqOgWkfcHXGlz:APA91bH9pa8b_DeCBsQ_6ZmqZBzvIDutWAdwWxf1BL9t0mtIGJTAJRY5im43SMoGHn3ocUHpsYw4BLeZsRKUWhuLHI2HLqszWP1Br1UiScaIoXZDQPM_1wJv04-OyPDH1sTU2ruSIte1';
        $token_1=$teacher->user->fcmToken;
        //dd($token_1);
        $data = [
    
            "registration_ids" => [
                $token_1
            ],
    
            "notification" => [
    
                "title" => 'لديك اشعار من شعبة التعليم الالكتروني',
    
                "body" => $body,
    
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
    




    }

}
