<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;

class SystemController extends Controller
{
    public function showresult($key){
    	
    	$schools = School::where('name','like', '%', $key , '%')->get();

;    	return view('pages.system.search')->with(['schools'=>$schools]);
    }
}
