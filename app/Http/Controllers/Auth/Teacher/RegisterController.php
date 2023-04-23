<?php

namespace App\Http\Controllers\Auth\Teacher;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Teacher;
use App\Course;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Redirect;

class RegisterController extends Controller
{
         /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::TEACHER;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
      // $this->middleware('auth:admin');
    }
    
    /* public function __construct()
    {
        $this->middleware('guest:teacher');
    } */

    public function ShowRegisterForm(){
        $courses = Course::all();
        return view('auth.teacher.register',compact('courses'));
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:teachers'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return TEACHER::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function Register(Request $request){
        $this->validator($request->all())->validate();
        $teacher = TEACHER::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'course_id' => $request->course,
            'phone' => $request->phone,
        ]); 
        $this->guard('teacher')->login($teacher);
        return redirect('teacherf')->with('success','You are successfuly Create your Account');
    }    
}
