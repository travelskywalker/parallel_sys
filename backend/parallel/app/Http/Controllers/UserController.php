<?php

namespace App\Http\Controllers;


use App\User;
use App\Access;
use App\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function getuserinfo(){

        $school_id = Auth::user()->school_id;
        $user_id = Auth::user()->id;

        $user = DB::table('users')
        ->select('users.*','accesses.name as access_name', 'schools.name as school_name', 'schools.logo')
        // ->select('users.*')
        ->leftJoin('accesses', 'accesses.id', '=', 'users.access_id')
        ->leftJoin('schools', 'schools.id', '=', 'users.school_id')
        ->where('users.id','=', Auth::user()->id)
        /*->when(Auth::user()->access_id >= 1, function(query) use ($school_id){
            return $query->where('schools.id', $school_id)
        })*/
        ->get();

        return response()->json(['data'=>$user]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($fullpage = true)
    {

        $user_school_id = Auth::user()->school_id;
        $users = DB::table('users')
            ->select('users.name', 'accesses.name as access_name', 'schools.name as school_name', 'users.id', 'users.email')
            ->leftJoin('accesses', 'users.access_id', '=', 'accesses.id')
            ->leftJoin('schools', 'users.school_id', '=', 'schools.id')
            ->orderBy('users.name', 'asc')
            ->when(Auth::user()->access_id != 0, function ($query) use ($user_school_id) {
                return $query->where('users.school_id', $user_school_id);
            })
            ->get();


        // $users = DB::table('users')->get();
        return view('pages.user.users')->with(['users'=>$users, 'fullpage'=>$fullpage, 'page'=>'users']);
    }

    public function api_index(){
        return $this->index(false);
    }

    public function adduserview(){

        $user_school_id = Auth::user()->school_id;
        $access_id = Auth::user()->access_id;
        
        $accesses = Access::when(Auth::user()->access_id != 0, function ($query) use ($access_id) {
                        return $query->where('accesses.id', '>=', $access_id);
                    })->get();

        $schools = School::when(Auth::user()->access_id != 0, function ($query) use ($user_school_id) {
                            return $query->where('schools.id', $user_school_id);
                        })->get();

        return view('pages.user.adduser')->with(['schools'=>$schools, 'accesses'=>$accesses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        /*validate input*/
        if($request->access_id != 0 && $request->access_id != null){
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|unique:users|email',
                'access_id' =>'required',
                'school_id' => 'required',
            ]);
        }else{

            if($request->school_id){
                $request->merge(array('school_id' => null));
            }

            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|unique:users|email',
                'access_id' =>'required'
            ]);
        }

        $request->merge(array('password' => bcrypt($request->password)));

        $user = new User($request->all());
        if($user->save()){
         return response()->json(['message'=>'User has been added', 'user'=>$user]);
        }
    }

    public function createSchoolAdmin($school){
        $user = User::create([
            'name' => $school->admin,
            'email' => $school->email,
            'password' =>bcrypt('parallel123'),
            'school_id' =>$school->id,
            'access_id' => 1
        ]);

        return $user;
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
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function getstudentbystudentnumber($studentnumber, $school_id){

        $student = DB::table('students')
            ->select('students.id', 'students.studentnumber', 'admissions.student_id', 'admissions.school_id')
            ->leftJoin('admissions', 'admissions.student_id', '=', 'students.id')
            ->where('admissions.school_id', '=', $school_id)
            ->where('students.studentnumber', '=', $studentnumber)
            // ->orderBy('users.name', 'asc')
            // ->when(Auth::user()->access_id != 0, function ($query) use ($user_school_id) {
            //     return $query->where('users.school_id', $user_school_id);
            // })
            ->get();

        return response()->json(['data'=> $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $access = Access::find($user->access_id);
        $school = School::find($user->school_id);

        $user_school_id = Auth::user()->school_id;

        $accessData = Access::when(Auth::user()->access_id != 0, function ($query) use ($user) {
                        return $query->where('accesses.id', '>=', $user->access_id);
                    })->get();

        $schoolData = School::when(Auth::user()->access_id != 0, function ($query) use ($user_school_id) {
                            return $query->where('schools.id', $user_school_id);
                        })->get();

        return view('pages.user.edit')->with(['user'=>$user, 'access'=> $access, 'school' => $school, 'accesses' => $accessData, 'schools' => $schoolData]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->access_id != 0 && $request->access_id != null){
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|email',
                'access_id' =>'required',
                'school_id' => 'required',
            ]);
        }else{

            if($request->school_id){
                $request->merge(array('school_id' => null));
            }

            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|email',
                'access_id' =>'required'
            ]);
        }

        $user = User::find($id);

        $request->merge(array('password' => bcrypt($request->password)));
        
        if($user->update($request->all())){
         return response()->json(['message'=>'User has been updated', 'user'=>$user]);
        }
    }

    public function changepassword(Request $request){

        $validatedData = $request->validate([
            'password' => 'required|min:6',
            'retype-password' => 'required|same:password'
        ]);

        $user = User::find(Auth::user()->id);

        $user->update(['password'=>bcrypt($request->password), 'changepassword'=>1]);

        return response()->json(['message'=>'change password successful']);

    }

    public function savetheme(Request $request){
        $user = User::find(Auth::user()->id);

        $user->update(['theme'=>$request->theme]);

        return response()->json(['message'=>'Changing theme success']);
    }

    public function resetpassword($id){
        if(Auth::user()->access_id <= 1){
            $user = User::find($id);
            $pass = bcrypt('parallel123');
            $user->update(['password'=> $pass]);

            return response()->json(['message'=>'password reset successful']);
        }else{
            return response()->json(['message'=>'Reset password failed. You do not have access rights to reset password']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy(c $c)
    {
        //
    }

    public function logout(){
        auth()->logout();
        return redirect('/home');
        
    }
}
