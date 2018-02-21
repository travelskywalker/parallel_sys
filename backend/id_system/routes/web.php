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

Auth::routes();
Route::group(['middleware' => ['auth']], function() {
	Route::get('/', function () {
	    return view('welcome');
	});
	Route::get('/home', 'HomeController@index')->name('home');

	// school
	Route::get('/schools', 'SchoolController@index');
	Route::get('/school/{id}', 'SchoolController@show');
	Route::get('/school/classes/{id}', 'SchoolController@showclasses');

	// teacher
	Route::get('/teachers', 'TeacherController@index');
	Route::get('/teacher/{id}', 'TeacherController@show');

	// student
	Route::get('/students', 'StudentController@index');
	Route::get('/student/{id}', 'StudentController@show');

	// class
	Route::get('/classes', 'ClassesController@index');
	Route::get('/class/{id}', 'ClassesController@show');

	// section
	Route::get('/sections', 'SectionController@index');
	Route::get('/section/{id}', 'SectionController@show');

	// admin
	Route::get('/admin', function(){
		return view('pages.admin.admin');
	});

	// user
	Route::get('/users', 'UserController@index');
	Route::get('/user/add', 'UserController@adduserview');
	Route::get('/user/edit/{id}', 'UserController@edit');
	Route::post('/user/update/{id}', 'UserController@update');
	Route::get('/logout', 'UserController@logout');

	//admissions
	Route::get('/admissions', 'AdmissionController@index');
	Route::get('/admission/{$id}', 'AdmissionController@show');
	Route::get('/admission/add', 'AdmissionController@showadmissionview');
});
