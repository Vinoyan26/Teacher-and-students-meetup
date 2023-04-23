<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $courses = Course::all();
        return view('welcome',compact('courses'));
    }
}
