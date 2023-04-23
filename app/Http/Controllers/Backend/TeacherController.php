<?php

namespace App\Http\Controllers\Backend;

use App\Teacher;
use App\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers=Teacher::orderby('id','desc')->get();
        return view('backend.teacher.index',compact('teachers')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('backend.teacher.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        $courses = Course::all();
        $teacher=Teacher::findOrFail($id);
        return view('backend.teacher.edit',compact('teacher','courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:teachers'],
        ]);
    }

    public function update(Request $request, $id)
    {
       // $this->validator($request->all())->validate();
        $pro=Teacher::findOrFail($id);
        $pro->name=$request->name;
        $pro->phone=$request->phone;
        $pro->email=$request->email;
        $pro->course_id=$request->course;
        
        $pro->update(); 
        return redirect('teacher')->with('success','You are successfuly Create your Account');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pro=Teacher::findOrFail($id);
        $pro->delete();
        return redirect('/teacher')->with('success','Successfully Deleted');
    }
}
