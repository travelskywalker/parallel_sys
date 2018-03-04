<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\School;
use App\Classes;
use App\Section;
use App\Admission;
use App\Student;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($fullpage = true)
    {
        $user_school_id = Auth::user()->school_id;

        $admissions = DB::table('admissions')
            ->select('admissions.id','admissions.date', 'students.studentnumber', 'students.firstname', 'students.lastname', 'admissions.student_id', 'admissions.school_id', 'admissions.status', 'schools.name as school_name')
            ->leftJoin('students', 'students.id', '=', 'admissions.student_id')
            ->leftJoin('schools', 'schools.id', '=', 'admissions.school_id')
            ->when(Auth::user()->access_id != 0, function ($query) use ($user_school_id) {
                return $query->where('schools.id', $user_school_id);
            })
            ->get();

        return view('pages.admission.admissions')->with(['admissions'=>$admissions, 'fullpage' => $fullpage, 'page'=>'index']);
    }

    public function api_index(){
        return $this->index(false);
    }

    public function showadmissionview($fullpage = true){

        $user_school_id = Auth::user()->school_id;


        $schools = School::when(Auth::user()->access_id != 0, function ($query) use ($user_school_id) {
                return $query->where('id', $user_school_id);
            })->get();

        $classes = Classes::when(Auth::user()->access_id != 0, function ($query) use ($user_school_id) {
                return $query->where('school_id', $user_school_id);
            })->get();

        return view('pages.admission.add')->with(['schools'=>$schools, 'classes'=>$classes, 'fullpage' => $fullpage, 'page'=>'add']);
    }

    public function api_showadmissionview(){
        return $this->showadmissionview(false);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $validatedData = $request->validate([
            'school_id' => 'required',
            'classes_id' => 'required',
            'section_id' => 'required',
            'admission_id' => 'required',
            'student_id' => 'required',
            'admission_date' =>'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'birthdate' => 'required',
            'fathers_name' => 'required',
            'mothers_name' => 'required',
            'guardian_name' => 'required',
            'emergencycontactnumber' => 'required',
        ]);

        $request->birthdate = \Carbon\Carbon::parse($request->birthdate);
        $request->admission_date = \Carbon\Carbon::parse($request->admission_date);

        // $request->merge(array('birthdate' => date("Y-m-d H:i:s", strtotime($request->birthdate) ) ) );

        // $request->merge(array('admission_date' => date("Y-m-d H:i:s", strtotime($request->admission_date) ) ) );

        // var_dump($request->birthdate);


        // create student
        /*$student = Student::create([
            'studentnumber' => $request->student_id,
            'firstname' => $request->first_name,
            'middlename' => $request->middle_name,
            'lastname' => $request->last_name,
            'gender' => $request->gender,
            'birthdate' => $request->birthdate,
            'address' =>$request->address,
            'fathersname' => $request->fathers_name,
            'mothersname' => $request->mothers_name,
            'guardianname' => $request->guardian_name,
            'emergencycontactnumber' => $request->emergencycontactnumber,
            'nationality' => $request->nationality,
            'religion' => $request->religion,
            'status' => 'Enrolled',
        ])->admission()->create([
            'admissionnumber' => $request->admission_id,
            'date' => $request->admission_date,
            'school_id' => $request->school_id,
            'classes_id' => $request->classes_id,
            'section_id' => $request->section_id,
            'status' => 'enrolled',
            'notes' => $request->notes,
            'description' => $request->description,
        ]);*/

        var_dump($request->school_id);

        if($request->image != null){
            $image = app(\App\Http\Controllers\UploadController::class)->imageUpload('files/'.$request->school_id.'/images/student/'+$student->id+'/',$request->image);

            $student->update(['image'=> $image]);
        };

        return response()->json(['message'=>'Student has been enrolled','data'=>$request]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $fullpage = true)
    {
        $user_school_id = Auth::user()->school_id;

        $admission = DB::table('admissions')
            ->select('admissions.*','admissions.date', 'students.*', 'schools.name as school_name', 'classes.*', 'classes.name as class_name')
            ->leftJoin('students', 'students.id', '=', 'admissions.student_id')
            ->leftJoin('schools', 'schools.id', '=', 'admissions.school_id')
            ->leftJoin('classes', 'classes.school_id', '=', 'schools.id')
            ->where('admissions.id','=', $id)
            ->get();

            $classes = Classes::where('school_id', $admission[0]->school_id)->get();
            $sections = Section::where('classes_id', $admission[0]->classes_id)->get();

            return view('pages.admission.admission')->with(['admission'=>$admission, 'classes'=>$classes, 'sections'=>$sections, 'fullpage' => $fullpage, 'page'=>'details']);
    }

    public function api_show($id){
        return $this->show($id, false);
    }

    public function searchAdmissionData($admissionnumber, $userschoolid){

        $admission = Admission::where('admissionnumber','=', $admissionnumber, 'and', 'schoolid', '=', $userschoolid)->get();

        return response()->json(['data'=>$admission]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
