<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use App\Student;
use App\Teacher;
use App\Classes;
use App\Section;

class SystemController extends Controller
{
    public function showresult($key){

    	$schools = School::where('name','like', '%'. $key . '%')->get();

    	$students = Student::where('firstname', 'like', '%'. $key . '%')
    						->orWhere('middlename', 'like', '%'. $key . '%')
    						->orWhere('lastname', 'like', '%'. $key . '%')
    						->get();

    	$teachers = Teacher::where('firstname', 'like', '%'. $key . '%')
    						->orWhere('middlename', 'like', '%'. $key . '%')
    						->orWhere('lastname', 'like', '%'. $key . '%')
    						->get();

    	$classes = Classes::where('name', 'like', '%'. $key . '%')
    						->get();

    	$sections = Section::where('name', 'like', '%'. $key . '%')
    						->get();

    	return view('pages.system.search')->with([
											'schools'=>$schools,
											'students'=>$students,
											'teachers'=>$teachers,
											'classes'=>$classes,
											'sections'=>$sections,
										]);
    }

    public function getContacts(){
        $contacts = Student::all();

        return response()->json(['data'=>$contacts]);
    }
}
