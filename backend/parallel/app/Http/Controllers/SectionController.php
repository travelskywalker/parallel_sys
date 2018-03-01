<?php

namespace App\Http\Controllers;

use App\Section;
use App\Classes;
use App\Teacher;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class SectionController extends Controller
{

    private $fullpage = true;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($fullpage = true)
    {
        $user_school_id = Auth::user()->school_id;

        $section = Section::all();

        $sections = DB::table('sections as s')
            ->select('s.id','s.name','teachers.firstname as teacher_firstname', 'teachers.lastname as teacher_lastname', 's.timefrom', 's.timeto','s.room', 's.studentlimit', 'classes.name as class_name', 's.notes', 's.description', 's.status', 'schools.name as school_name')
            ->leftJoin('classes', 's.classes_id','=', 'classes.id')
            ->leftJoin('schools', 'classes.school_id', '=', 'schools.id')
            ->leftJoin('teachers', 's.teacher_id', '=', 'teachers.id')
            ->orderby('s.name','asc')
            ->when(Auth::user()->access_id != 0, function ($query) use ($user_school_id) {
                return $query->where('classes.school_id', $user_school_id);
            })
            ->get();

        return view('pages.section.sections')->with(['sections'=>$sections, 'fullpage'=>$fullpage, 'page'=>'index']);
    }

    public function api_index(){
        return $this->index(false);
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
    public function shownewsection($fullpage = true){
        return view('pages.section.new')->with(['fullpage'=>$fullpage, 'page'=>'add']);
    }
    public function api_shownewsection(){
        return $this->shownewsection(false);
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
     * @param  \App\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section, Classes $classes, Teacher $teacher, $id)
    {
        $section = Section::find($id);

        $teachers = Teacher::find($section->teacher_id);

        $class = Classes::find($section->classes_id);

        // $students = Student::where('section_id','=',$id)->get();

        return view('/pages.section.section')->with(['section'=>$section, 'teachers'=>$teachers, 'classes'=>$class]);
    }

    public function findData($id){

        $section = DB::table('sections')
            ->select('teachers.firstname as firstname', 'teachers.lastname as lastname', 'sections.timefrom', 'sections.timeto')
            ->leftJoin('teachers', 'sections.teacher_id', '=', 'teachers.id')
            ->where('sections.id',$id)
            ->get();


        return response()->json(['message'=>'success', 'data'=>$section]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sections $sections)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        //
    }
}
