<?php

namespace App\Http\Controllers\Backend;

use App\User;
use App\Course;
use App\Teacher;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
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
        $students=User::orderby('id','desc')->get();
        $teachers=Teacher::orderby('id','desc')->get();
        return view('backend.student.index',compact('students','teachers')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        $teachers=Teacher::orderby('id','desc')->get();
        return view('backend.student.create',compact('courses','teachers'));
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
        $student=User::findOrFail($id);
        $courses = Course::all();
        $teachers=Teacher::orderby('id','desc')->get();
        return view('backend.student.edit',compact('student','courses','teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pro=User::findOrFail($id);
        $pro->name=$request->name;
        $pro->phone=$request->phone;
        $pro->email=$request->email;
        $pro->teacher_id=$request->teacher;
        $pro->bday=$request->bday;
        $pro->nic=$request->nic;
        
        $pro->update(); 

        $sc=DB::table('course_user')->insert([
            ['course_id' => $request->course, 'user_id' => $id],
        ]);

        return redirect('student');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pro=User::findOrFail($id);
        $pro->delete();
        return redirect('/student')->with('success','Successfully Deleted');
    }
}
