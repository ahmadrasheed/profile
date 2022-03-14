<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers=Teacher::all();
        return view('teachers.index',['teachers'=>$teachers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fname'=>'required',
            'lname'=>'required',
            'birth'=>'numeric',
            'side' =>'required'
        ]);
        $newTeacher=new Teacher();
        $newTeacher->fname=$request->input('fname');
        $newTeacher->lname=$request->input('lname');
        $newTeacher->birth=$request->input('birth');
        $newTeacher->side=$request->input('side');
        $newTeacher->save();

        return view('teachers.index',['teachers'=>Teacher::all()]);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
       // dd('no');
        return view('teachers.edit',['teacher'=>$teacher]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $teacher->fname=$request->input('fname');
        $teacher->lname=$request->input('lname');
        $teacher->birth=$request->input('birth');
        $teacher->side=$request->input('side');
        $teacher->update();

        return view('teachers.index',['teachers'=>Teacher::all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher )
    {
        $teacher->delete();
        return view('teachers.index',['teachers'=>Teacher::all()]);
    }
}
