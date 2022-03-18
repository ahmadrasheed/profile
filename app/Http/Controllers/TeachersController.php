<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\School;

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
        $schools=School::orderBy('name')->get();
        return view('teachers.create',['schools'=>$schools]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());

       // dd($request->input('school_id'));
        $request->validate([
            'fname'=>'required',
            'lname'=>'required',
            'school_id'=>'required|numeric',
            'birth'=>'numeric',
            'side' =>'required'
        ]);
        $newTeacher=new Teacher();
        $newTeacher->fname=$request->input('fname');
        $newTeacher->lname=$request->input('lname');
        $newTeacher->school_id=$request->input('school_id');
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

    public function selectSearch(Request $request){

        $movies = [];

        
            
            if(!empty($request->input('q'))){
                
                $search = $request->q;
                $movies =School::select("id", "name")
                        ->where('name', 'LIKE', "%$search%")
                        ->get();
                }
                else
                    {
                        $search = $request->q;
                        $movies =School::select("id", "name")
                                ->get();
                    }



        return response()->json($movies);
            

    }
}//end class
