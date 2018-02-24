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
	Route::get('/schools', function(){
		return view('pages.school.index');
	});

	Route::get('/schools/index', 'SchoolController@index');

	Route::get('/school/{id}', 'SchoolController@show');
	Route::get('/school/classes/{id}', 'SchoolController@showclasses');

	// teacher

	Route::get('/teachers', function(){
		return view('pages.teacher.index');
	});

	Route::get('/teachers/index', 'TeacherController@index');
	Route::get('/teacher/{id}', 'TeacherController@show');

	// student
	Route::get('/students', function(){
		return view('pages.student.index');
	});


	Route::get('/students/index', 'StudentController@index');
	Route::get('/student/{id}', 'StudentController@show');

	// class
	Route::get('/classes', function(){
		return view('pages.classes.index');
	});
	Route::get('/classes/index', 'ClassesController@index');
	Route::get('/classes/{id}', 'ClassesController@show');
	Route::get('/classes/add', 'ClassesController@addclassesview');

	// section
	Route::get('/sections', function(){
		return view('pages.section.index');
	});

	Route::get('/sections/index', 'SectionController@index');
	Route::get('/section/{id}', 'SectionController@show');

	// admin
	Route::get('/admin', function(){
		return view('pages.admin.index');
	});

	Route::get('/admin/index', 'AdminController@index');

	// user
	Route::get('/users', 'UserController@index');
	Route::get('/user/add', 'UserController@adduserview');
	Route::get('/user/edit/{id}', 'UserController@edit');
	Route::post('/user/update/{id}', 'UserController@update');
	Route::get('/logout', 'UserController@logout');

	//admissions
	Route::get('/admissions', function(){
		return view('pages.admission.index');
	});
	
	Route::get('/admissions/index', 'AdmissionController@index');
	Route::get('/admission/new', 'AdmissionController@showadmissionview');
	Route::get('/admission/{id}', 'AdmissionController@show');
	
});
