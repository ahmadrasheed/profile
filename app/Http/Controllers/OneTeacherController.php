<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OneTeacherController extends Controller
{
    public function show(Request $request){
     
        // $user=auth()->user();
        // $teacher=Teacher::find($user->id);
        
       $teacher=Teacher::findOrfail(Auth::user()->teacher->id);
       $school=School::findOrfail(Auth::user()->teacher->school_id);
       //dd($teacher);
        return view('oneTeacher.index',[
            'teacher'=>$teacher,
            'school'=>$school
        ]);
    }

    public function update(Request $request,$id)
    {

        $request->validate([
            'fname'=>'required|max:256',
            'lname'=>'required|max:256',
            'birth'=>'required|numeric',
            'livesearch'=>'required',

        ]);
        $teacher=Teacher::findOrfail($id);
        //dd($teacher);
        $teacher->fname=$request->input('fname');
        $teacher->lname=$request->input('lname');
        $teacher->birth=$request->input('birth');
        $teacher->side=$request->input('side');
        $teacher->update();

        $school=School::findOrfail($teacher->school_id);

        return view('oneTeacher.index',['teacher'=>$teacher,'school'=>$school]);

    }
}
