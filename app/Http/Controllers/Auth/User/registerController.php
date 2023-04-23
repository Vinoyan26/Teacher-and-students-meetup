<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Course;
use App\Teacher;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Redirect;

class RegisterController extends Controller
{
    
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
   // protected $redirectTo = RouteServiceProvider::USER;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /* public function __construct()
    {
        $this->middleware('guest');
    } */

    public function __construct()
    {
      // $this->middleware('auth:admin');
    }

    public function ShowRegisterForm(){
        $courses = Course::all();
        $teachers=Teacher::orderby('id','desc')->get();
        return view('auth.student.register',compact('courses','teachers'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
           // 'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

      /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
  

    public function Register(Request $request){
        $this->validator($request->all())->validate();
        $user = User::create([
           // 'fname' => $request->fname,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nic' => $request->nic,
            'teacher_id' => $request->teacher,
            'bday' => $request->bday,
            'phone' => $request->phone,
            'course' => $request->course,
        ]); 

        $stu_id = DB::table('users')->latest()->first()->id;
        $sc=DB::table('course_user')->insert([
            ['course_id' => $request->course, 'user_id' => $stu_id],
        ]);  
        
       // $this->guard()->login($user);
        return redirect('home')->with('success','You are successfuly Create your Account'); 
    }


}
