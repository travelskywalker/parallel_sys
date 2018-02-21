<?php

namespace App\Http\Controllers;

use App\School;
use App\Classes;
use App\Http\Resources\School as SchoolResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return SchoolResource::collection(School::all());
        if(Auth::user()->access_id != 0){
            $school_id = Auth::user()->school_id;

            return $this->show($school_id);
        }else{
            $schools = School::orderby('name', 'asc')->get();
            return view('pages.school.school')->with('schools', $schools);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $schooldetails = School::find($id);

        $classes = School::find($id)->classes;

        $teachers = School::find($id)->teachers;

        return view('pages.school.details')->with(
            [
                'school' => $schooldetails,
                'classes'=> $classes,
                'teachers' => $teachers
            ]
        );

        // return view('pages.school.details')->with('school', $data);

    }

    public function showclasses(School $school, $id)
    {
        $classes = School::find($id)->classes;
        return view('pages.school.classes')->with('classes', $classes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        //
    }

    

}
