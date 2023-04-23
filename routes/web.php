<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});
*/

//Auth::routes();

Route::get('/','WelcomeController@index');

//For Student............................. 
Route::get('/login','Auth\User\LoginController@ShowLoginForm')->name('login');
Route::post('/login','Auth\User\LoginController@Login')->name('login');
Route::get('/register','Auth\User\RegisterController@ShowRegisterForm')->name('register');
Route::post('/register','Auth\User\RegisterController@Register')->name('register');
Route::post('/logout','Auth\User\LoginController@logout')->name('logout');

//For Teacher............................. 
Route::get('/login/teacher','Auth\Teacher\LoginController@ShowLoginForm')->name('login.teacher');
Route::post('/login/teacher','Auth\Teacher\LoginController@Login')->name('login.teacher');
Route::get('/register/teacher','Auth\Teacher\RegisterController@ShowRegisterForm')->name('register.teacher');
Route::post('/register/teacher','Auth\Teacher\RegisterController@Register')->name('register.teacher');

Route::resource('/teacher','Backend\TeacherController');

//For Admin
Route::get('/login/admin','Auth\Admin\LoginController@ShowLoginForm')->name('login.admin');
Route::post('/login/admin','Auth\Admin\LoginController@Login')->name('login.admin');
//Route::get('/register/admin','Auth\Admin\RegisterController@ShowRegisterForm')->name('register.admin');
//Route::post('/register/admin','Auth\Admin\RegisterController@Register')->name('register.admin');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/teacherf', 'TeacherController@index')->name('teacherf');

//For Course
Route::resource('/course','Backend\CourseController');
Route::resource('/student','Backend\StudentController');
Route::resource('meeting','Frontend\MeetingController');
