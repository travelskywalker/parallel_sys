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
Route::get('/', function () {
	    return view('welcome');
	});
Route::group(['middleware' => ['auth']], function() {
	
	Route::get('/home', 'HomeController@index')->name('home');

	// school
	Route::get('/school', 'SchoolController@index');
	Route::get('/s/school', 'SchoolController@api_index');


	Route::get('/school/add', 'SchoolController@shownewschool');
	Route::get('/s/school/add', 'SchoolController@api_shownewschool');

	Route::get('/school/{id}', 'SchoolController@show');
	Route::get('/s/school/{id}', 'SchoolController@api_show');


	Route::get('/school/classes/{id}', 'SchoolController@showclasses');

	Route::get('/school/{id}/student/search/{key}', 'SchoolController@student_search');

	// teacher
	Route::get('/teacher', 'TeacherController@index');
	Route::get('/s/teacher', 'TeacherController@api_index');

	Route::get('/teacher/add', 'TeacherController@shownewteacher');
	Route::get('/s/teacher/add', 'TeacherController@api_shownewteacher');

	Route::get('/teacher/{id}', 'TeacherController@show');
	Route::get('/s/teacher/{id}', 'TeacherController@api_show');

	

	// student
	Route::get('/student', 'StudentController@index');
	Route::get('/s/student', 'StudentController@api_index');

	Route::get('/student/{id}', 'StudentController@show');
	Route::get('/s/student/{id}', 'StudentController@api_show');

	// class
	Route::get('/classes', 'ClassesController@index');
	Route::get('/s/classes', 'ClassesController@api_index');

	Route::get('/classes/add', 'ClassesController@shownewclassesview');
	Route::get('/s/classes/add', 'ClassesController@api_shownewclassesview');

	Route::get('/classes/{id}', 'ClassesController@show');
	Route::get('/s/classes/{id}', 'ClassesController@api_show');
	

	// section
	
	Route::get('/section', 'SectionController@index');
	Route::get('/s/section', 'SectionController@api_index');

	Route::get('/section/add', 'SectionController@shownewsection');
	Route::get('/s/section/add', 'SectionController@api_shownewsection');

	Route::get('/section/{id}', 'SectionController@show');
	Route::get('/s/section/{id}', 'SectionController@api_show');

	// admin
	Route::get('/admin', 'AdminController@index');
	Route::get('s/admin', 'AdminController@api_index');

	// user
	Route::get('/userinfo', 'UserController@getuserinfo');

	Route::get('/users', 'UserController@index');
	Route::get('/s/users', 'UserController@api_index');

	Route::get('/user/resetpassword/{id}', 'UserController@resetpassword');

	Route::get('/user/changepasswordform',function(){
		return view('pages.user.system.changepassword');
	});

	Route::get('/user/system/themeeditform', function(){
		return view('pages.user.system.changetheme');
	});

	Route::get('/user/system/widgeteditform', function(){
		return view('pages.user.system.changewidget');
	});

	Route::post('/user/changepassword', 'UserController@changepassword');
	Route::post('/user/system/savetheme', 'UserController@savetheme');

	Route::get('/user/add', 'UserController@adduserview');
	Route::get('/user/edit/{id}', 'UserController@edit');
	Route::post('/user/update/{id}', 'UserController@update');
	Route::get('/logout', 'UserController@logout');

	//admissions
	/*Route::get('/admissions', function(){
		return view('pages.admission.index');
	});*/

	Route::get('/admission', 'AdmissionController@index');
	Route::get('/s/admission', 'AdmissionController@api_index');

	
	// Route::get('/admissions/index', 'AdmissionController@index');

	Route::get('/admission/new', 'AdmissionController@showadmissionview');
	Route::get('/s/admission/new', 'AdmissionController@api_showadmissionview');


	Route::get('/admission/{id}', 'AdmissionController@show');
	Route::get('/s/admission/{id}', 'AdmissionController@api_show');

	Route::get('/admission/form/{type}/{id}', 'AdmissionController@showadmissionform');

	// system
	Route::get('/system/search/{key}', 'SystemController@showresult');
	Route::get('/system/contacts', 'SystemController@getContacts');


	
});
