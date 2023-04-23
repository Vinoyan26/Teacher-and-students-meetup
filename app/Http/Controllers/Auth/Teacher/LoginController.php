<?php

namespace App\Http\Controllers\Auth\Teacher;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Redirect;
use Illuminate\Support\MessageBag;
use Input;

class LoginController extends Controller
{
        /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest:teacher')->except('logout');
    }

    public function ShowLoginForm(){
        return view('auth.teacher.login');
    }

    public function Login(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(Auth::guard('teacher')->attempt(['email'=>$request->email , 'password'=>$request->password],$request->get('remember'))){
                return redirect()->intended('/teacherf')->with('success','You are successfuly login your Account');
        }
       $errors = new MessageBag(['password' => ['Email or password invalid.']]);
        return Redirect::back()->withErrors($errors)->withInput(Input::except('password'));
    }
}
