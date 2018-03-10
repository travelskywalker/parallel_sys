<?php

namespace App\Http\Controllers;

use App\Section;
use App\Classes;
use App\Teacher;
use App\Student;
use App\School;
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
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'classes_id' => 'required',
            'name' => 'required',
            'timefrom' => 'required',
            'timeto' => 'required',
        ]);

        // var_dump($request->timefrom);


        // substr_replace("Hello world","earth",6);

        // var_dump($request->timefrom);

        // return false;

        $request->merge(array('timefrom' => date("H:i", strtotime($request->timefrom) ) ) );
        $request->merge(array('timeto' => date("H:i", strtotime($request->timeto) ) ) );


        // $request->timefrom = \Carbon\Carbon::parse($request->timefrom);
        // $request->timeto = \Carbon\Carbon::parse($request->timeto);



        $section = Section::create($request->all());

        return response()->json(['data'=>$section, 'message'=>'Section has been added']);
    }
    public function shownewsection($fullpage = true){

        $user_school_id = Auth::user()->school_id;

        $schools = DB::table('schools')
            ->when(Auth::user()->access_id != 0, function($query) use ($user_school_id){
                return $query->where('schools.id', $user_school_id);
            })
        ->get();

        if(School::find($user_school_id)){
            $teachers = School::find($user_school_id)->teachers;
            $classes = School::find($user_school_id)->classes;
        }else{
            $teachers = [];
            $classes = [];
        }



        return view('pages.section.add')->with(['schools'=>$schools, 'classes'=>$classes, 'teachers'=>$teachers, 'fullpage'=>$fullpage, 'page'=>'add']);
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
    public function show($id, $fullpage = true)
    {
        $section = Section::find($id);

        $teachers = Teacher::find($section->teacher_id);

        $class = Classes::find($section->classes_id);

        // $students = Student::where('section_id','=',$id)->get();

        return view('/pages.section.section')->with(['section'=>$section, 'teachers'=>$teachers, 'classes'=>$class, 'fullpage'=>$fullpage]);
    }

    public function api_show($id){
        return $this->show($id, false);
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
