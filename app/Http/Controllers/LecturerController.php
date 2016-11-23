<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Student;
use App\Course;
use App\Lecturer;
use App\User;
use Auth;
use DB;
use Hash;
use Session;
use Log;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Select * FROM students S,course C Where S.courseID = C.courseID
        $display_LectList = DB::table('lecturer')
            ->orderBy('lecturerName', 'asc')
            ->paginate(50);

        return view('lecturerParticular.viewLecturer')->with('display_LectList', $display_LectList);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $display_CourseName = DB::table('course')
            ->select('courseID', 'courseName')
            ->get();
        return view('lecturerParticular.createLecturer')->with('displayCourse', $display_CourseName);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $getPassword = $request->input('lecturer_Password');

        $this->validate($request, [
                'lecturer_Password' => 'required|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{7,}$/',
            ]);

        $hashedPassword = Hash::make($getPassword);

        $validateNRIC = $request->input('lecturer_Nric');
        if(Lecturer::where('lecturer_Nric', '=', $validateNRIC )->exists()){
            Session::flash('unsuccess_NRIC', 'NRIC ID exists' );
            return redirect()->back();
        }

        $getDate = $request->input('birthDate');
        $getDate = date('Y-m-d', strtotime($getDate));        
        date_default_timezone_set('Asia/Singapore');

        $createLogin = new User();
        $createLogin->name = $request->input('lecturer_id');
        $createLogin->password = $hashedPassword;
        $createLogin->role = 'Lecturer';
        //$createLogin->email = 'random@email.com';
        $createLogin->save();

        $getParticulars = new Lecturer();
        $getParticulars->lecturerID = $request->input('lecturer_id');
        $getParticulars->lecturerName = $request->input('lecturerName');
        $getParticulars->lecturer_Nric =$validateNRIC;
        $getParticulars->lecturerPassword = $hashedPassword;
        $getParticulars->password_date = date('Y/m/d');
        $getParticulars->email = $request->input('lecturer_email');
        $getParticulars->address = $request->input('address');
        $getParticulars->birth_Date = $getDate;
        $getParticulars->position = $request->input('position');
        

        $getParticulars->save();

        Session::flash('success', 'Lecturer Particular have been successfully created!');
        return redirect()->route('lecturers.index');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_lecturer()
    {
        $id = Auth::user()->name;
        error_log($id);
        $edit_lecturer = DB::table('lecturer')
            ->where('lecturerID' ,'=', $id)
            ->get();

        error_log($edit_lecturer);
        return view('lecturerParticular.editLecturer')->with('edit_lecturer', $edit_lecturer);
    }

    public function edit($id)
    {
        $edit_lecturer = DB::table('lecturer')
            ->where('lecturerID' ,'=', $id)
            ->get();

        return view('lecturerParticular.editLecturer')->with('edit_lecturer', $edit_lecturer);
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
        $input = $request->all();
        $getUserRole = Auth::user()->role;

        $getDate = $request->input('birthDate');
        $getDate = date('Y-m-d', strtotime($getDate));

        date_default_timezone_set('Asia/Singapore');
        $s = $request->input('lect_Checkbox');
        error_log($s);
        // Validate for a change in Password
        if($request->input('lect_Checkbox') === 'enabled_Checkbox'){

            $getPassword = $request['lecturer_Password'];

            $this->validate($request, [
                'lecturer_Password' => 'required|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{7,}$/',
            ]);
            
            $hashedPassword = Hash::make($getPassword);

            if($getUserRole == 'Admin'){

                // Admin able to change Lecturer status
                DB::table('lecturer')
                ->where('lecturerID', $id)
                ->update([
                    'lecturerName' => $request['lecturerName'],
                    'birth_Date' => $getDate,
                    'lecturerPassword' => $hashedPassword,
                    'password_date' => date('Y/m/d'),
                    'address' => $request['address'],
                    'position' => $request['position'],
                ]);
            }
            else{

                // Lecturer update their own profile
                DB::table('lecturer')
                ->where('lecturerID', $id)
                ->update([
                    'lecturerName' => $request['lecturerName'],
                    'birth_Date' => $getDate,
                    'lecturerPassword' => $hashedPassword,
                    'password_date' => date('Y/m/d'),
                    'address' => $request['address']
                   // 'position' => $request['position'],
                ]);
            }

             DB::table('users')
        ->where('name', $id)
        ->update([
            'password' => $hashedPassword
            ]); 
         }
         // Without Change Password
         else{

            if($getUserRole == 'Admin'){

                // Admin able to change Lecturer status
                DB::table('lecturer')
                ->where('lecturerID', $id)
                ->update([
                    'lecturerName' => $request['lecturerName'],
                    'birth_Date' => $getDate,
                    'address' => $request['address'],
                    'position' => $request['position'],
                ]);
            }
                // Lecturer/HOD can only update their own info
            else{
            DB::table('lecturer')
            ->where('lecturerID', $id)
            ->update([
                'lecturerName' => $request['lecturerName'],
                'birth_Date' => $getDate,
                'lecturerPassword' => $request['lect_Pass'] ,
                'address' => $request['address']
            ]);

            }

         }

        Session::flash('success', 'Updates have been successfully saved!');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($lecturer_id)
    {

        if(Course::where('lecturerID', '=', $lecturer_id )->exists()){
            Session::flash('unsuccess_Delete', 'Current HOD is in-charge of a Course. Change the Course-in-Charge to another HOD' );
            return redirect()->back();      
        }

        // Remove Staff Entry
        DB::table('lecturer')
            ->where('lecturerID', '=', $lecturer_id)
            ->delete();

        Session::flash('success', 'Staff particular has been successfully deleted');

        return redirect()->route('lecturers.index');


    }


}
