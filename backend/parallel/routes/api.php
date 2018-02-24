<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// school
Route::get('/school/list', 'SchoolController@index');
Route::get('/school/{school_id}/classes', 'SchoolController@getclasses');
// teacher

// student
Route::get('/student/{studentnumber}/{school_id}', 'UserController@getstudentbystudentnumber');

// class
Route::get('/class/{class_id}/sections', 'ClassesController@getsections');

// section
Route::get('/section/{id}', 'SectionController@findData');

// user
Route::post('/user/add', 'UserController@create');

// access
Route::get('/access', 'AccessController@index');

// admission
Route::get('/admission/{admissionnumber}/{userschoolid}', 'AdmissionController@searchAdmissionData');
Route::post('/admission/new', 'AdmissionController@create');