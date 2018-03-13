<?php

namespace App\Http\Controllers;

use App\School;
use App\User;
use App\Classes;
use App\Http\Resources\School as SchoolResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\UploadController;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($fullpage = true)
    {
        // return SchoolResource::collection(School::all());
        if(Auth::user()->access_id != 0){
            $school_id = Auth::user()->school_id;
            return $this->show($school_id)->with(['fullpage'=>$fullpage, 'page'=>'index']);
        }else{
            $schools = School::orderby('name', 'asc')->get();
            return view('pages.school.school')->with(['schools'=>$schools, 'fullpage'=>$fullpage, 'page'=>'index']);
        }
    }

    public function api_index(){
        return $this->index(false);
    }

    public function all(){

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        // validate data
        $validatedData = $request->validate([
            'name' => 'required',
            'admin' => 'required',
            'email' => 'required|email',
            'phonenumber' => 'required',
            'address' => 'required'
        ]);

        // create school data
        $school = School::create($request->all());

        if($request->logo != null){
            $logo = app(\App\Http\Controllers\UploadController::class)->imageUpload('files/'.$school->id.'/images/logo/',$request->logo);

            $school->update(['logo'=> $logo]);
        };

        // create school admin
        $adminUser = app(\App\Http\Controllers\UserController::class)->createSchoolAdmin($school);

        return response()->json(['message'=>'School has been added','data'=>$school]);
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
    public function show($id, $fullpage = true)
    {
        $schooldetails = School::find($id);

        $classes = School::find($id)->classes;

        $teachers = School::find($id)->teachers;

        $sections = School::find($id)->sections;

        $students = DB::table('students')
                        ->select('students.*')
                        
                        ->leftJoin('admissions', 'admissions.student_id', '=', 'students.id')
                        ->leftJoin('schools', 'schools.id', '=', 'admissions.school_id')
                        ->where('schools.id', $id)
                        ->get();

        return view('pages.school.details')->with(
            [
                'school' => $schooldetails,
                'classes'=> $classes,
                'teachers' => $teachers,
                'sections' => $sections,
                'students' => $students,
                'fullpage' => $fullpage,
                'page' => 'details',
            ]
        );

        // return view('pages.school.details')->with(['school'=>$data, 'fullpage'=>$fullpage]);
    }

    public function api_show($id){
        return $this->show($id, false);
    }

    public function shownewschool($fullpage = true){
        return view('pages.school.add')->with(['fullpage'=>$fullpage, 'page'=>'add']);
    }

    public function api_shownewschool(){
        return $this->shownewschool(false);
    }

    public function showclasses(School $school, $id)
    {
        $classes = School::find($id)->classes;
        return view('pages.school.classes')->with('classes', $classes);
    }

    public function getclasses($school_id){
        $classes = Classes::where('school_id', '=', $school_id)->get();

        return response()->json(['data'=>$classes]);
    }

    public function getteachers($school_id){
        $teachers = School::find($school_id)->teachers;

        return response()->json(['data'=>$teachers]);
    }

    public function student_search($id,$key){
        
        $students = DB::table('students')
                    ->select('students.*', 'admissions.student_id', 'schools.name as school_name','students.id')
                    ->leftJoin('admissions', 'admissions.student_id', '=', 'students.id')
                    ->leftJoin('schools', 'admissions.school_id', 'schools.id')
                    ->where('admissions.school_id','=', $id)
                    ->where(function($q) use ($key){
                        $q->orWhere('students.firstname', 'like', '%'. $key .'%');
                        $q->orWhere('students.middlename', 'like', '%'.$key.'%');
                        $q->orWhere('students.lastname', 'like', '%'. $key . '%');
                        $q->orWhere('students.studentnumber', 'like', '%'. $key . '%');
                    })
                    ->groupBy('students.id')
                    ->limit(5)
                    ->get();

                    // dd($students);

        return view('pages.admission.student-search')->with(['students'=>$students]);
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
