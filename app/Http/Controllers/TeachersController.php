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
        $schools=School::all();
        




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
        //dd($request->all());
        //dd($request->input('livesearch'));

       // dd($request->all());
        $request->validate([
            'fname'=>'required|max:256',
            'lname'=>'required|max:256',
            'school_id'=>'required|numeric|max:256',
            'birth'=>'numeric',
            'side' =>'required',
            'livesearch' =>'required|max:256'
        ]);
        $newTeacher=new Teacher();
        $newTeacher->fname=$request->input('fname');
        $newTeacher->lname=$request->input('lname');
        $newTeacher->school_id= $request->input('livesearch');
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
       //dd($teacher->school->name);
       // incase school_id of the teacher match no record in schools table.
       $school=new School;
       if(School::find($teacher->school_id)===null)
            $school->name='No School';
       else
            $school=School::find($teacher->school_id);
     
        return view('teachers.edit',[
            'teacher'=>$teacher,
            'school'=>$school,
        ]);
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
        $request->validate([
            'fname'=>'required|max:256',
            'lname'=>'required|max:256',
            'birth'=>'required|numeric',
            'livesearch'=>'required',

        ]);
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

    //to populate select dropdown menu with schools names using Ajax call with selecet2    javascript 
    public function selectSearch(Request $request){
        //q is the paramete that is sent with the request in Ajax call, while to save the selected value use $request-input('livesearch') to validate and save to DB.
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
