<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;

class MyAuthController extends Controller
{
   /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */


    public function login(){
        $user=User::first();
       
        //dd($user->teacher->fname);
        //this code to hash all password for users
        // $users=User::all();
        // foreach($users as $user){
        //     $user->password=Hash::make($user->password);
        //     $user->save();
        // }
        
        return view('auth.login');
     }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        //dd($credentials);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            //dd('1');
            if(Auth::user()->role==1){
                return redirect()->route('teachers.index');
            }
            //$teachers=Teacher::all();
            //dd(Auth()->user()->teacher()->fname);
        
            return redirect()->intended('show/teacher');
            //return view('teachers.index',['teachers'=>$teachers]);
        }
        //dd("b");
 
        return back()->with('error','wrong email or password');
            
        
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }


}
