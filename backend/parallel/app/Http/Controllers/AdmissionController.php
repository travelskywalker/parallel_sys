<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\School;
use App\Classes;
use App\Admission;
use App\Student;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('pages.admission.admissions');
    }

    public function showadmissionview(){
        $school = School::find(Auth::user()->school_id);

        $classes = Classes::where('school_id', '=', $school->id)->get();
        return view('pages.admission.add')->with(['school'=>$school, 'classes'=>$classes]);
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

        // create student
        $student = Student::create([
            'studentnumber' => $request->student_id,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
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
        ]);

        // create admission
        Admission::create([
            'admissionnumber' => $request->admissionnumber,
            'student_id' => $student->id,
            'school_id' => $request->school_id,
            'classes_id' => $request->classes_id,
            'status' => $request->status,
            'notes' => $request->notes,
            'description' => $request->description,
        ]);

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
    public function show($id)
    {
        //
    }

    public function searchAdmissionData($number, $userschoolid){

        $admission = Admission::where('admissionnumber','=', $number, 'and', 'schoolid', '=', $userschoolid)->get();

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
