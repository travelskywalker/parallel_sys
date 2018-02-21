<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   

        $user_school_id = Auth::user()->school_id;

        $teachers = DB::table('teachers')
            ->select('teachers.id', 'teachers.image' ,'teachers.teachernumber', 'teachers.firstname', 'teachers.lastname', 'schools.name as school_name', 'teachers.notes', 'teachers.description', 'teachers.status', 'teachers.school_id')
            ->leftJoin('schools', 'teachers.school_id', '=', 'schools.id')
            ->when(Auth::user()->access_id != 0, function ($query) use ($user_school_id) {
                return $query->where('teachers.school_id', $user_school_id);
            })
            ->get();

        return view('pages.teacher.teachers')->with(['teachers'=>$teachers]);
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
     * @param  \App\Teachers  $teachers
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher, Section $section, $id)
    {
        $teacher = Teacher::find($id);

        $sections = Teacher::find($id)->sections;



        return view('pages.teacher.teacher')->with(['teacher' => $teacher, 'sections' => $sections]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teachers  $teachers
     * @return \Illuminate\Http\Response
     */
    public function edit(Teachers $teachers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teachers  $teachers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teachers $teachers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teachers  $teachers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teachers $teachers)
    {
        //
    }
}
