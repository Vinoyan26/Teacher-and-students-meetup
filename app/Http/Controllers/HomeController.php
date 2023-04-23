<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Meeting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $meet=Meeting::orderby('id','desc')->get();
        $id=Auth::user()->id;
        $s = User::find($id);
        return view('home',compact('s','meet'));
    }
}
