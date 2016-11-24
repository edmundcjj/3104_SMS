<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Student;
use App\Course;
use App\User;
use App\Alumni_Student;
use App\Alumni_Result;
use Log;
use Auth;
use DB;
use Hash;
use Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $getUserName = Auth::user()->name;
        $getUserRole = Auth::user()->role;
        Log::info($getUserName);
        Log::info($getUserRole);

        if($getUserRole == "Admin")
        {
            // Select * FROM students S,course C Where S.courseID = C.courseID
            $display_StudentList = DB::table('student')
            ->join('course', 'student.courseID', '=', 'course.courseID')
            ->orderBy('studentName', 'asc')
            //->get()
            ->paginate(50);
        }
        else if($getUserRole == "Lecturer" || $getUserRole == "Hod")
        {
            $display_StudentList = DB::table('student')
                ->join('course', 'student.courseID', '=', 'course.courseID')
                ->where('course.lecturerID', '=', $getUserName)
                ->orderBy('course.courseName' ,'asc')
                ->paginate(50);
        }

        return view('studentParticular.viewParticular')->with('displayStudentList', $display_StudentList);
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

        return view('studentParticular.createParticular')->with('displayCourse', $display_CourseName);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $getPassword = $request->input('stud_Pass');

        $this->validate($request,[

                'stud_Pass' => 'required|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?#&])[A-Za-z\d$@$!%*?#&]{7,}$/',
            ]);
        $hashedPassword = Hash::make($getPassword);

        // // error_log("what up ");
        $validateNRIC = $request->input('studentNRIC');
        if(Student::where('student_Nric', '=', $validateNRIC )->exists()){
            Session::flash('unsuccess', 'NRIC ID exists' );
            return redirect()->back();
        }
        $getDate = $request->input('birthDate');
        $getDate = date('Y-m-d', strtotime($getDate));
       
        date_default_timezone_set('Asia/Singapore');

        $createLogin = new User();
        $createLogin->name = $request->input('student_id');
        $createLogin->password = $hashedPassword;
        $createLogin->role = 'Student';
        //$createLogin->email = 'random@email.com';
        $createLogin->save();

        $getParticulars = new Student();
        $getParticulars->studentID = $request->input('student_id');
        $getParticulars->studentName = $request->input('studentName');
        $getParticulars->student_Nric =$validateNRIC;
        $getParticulars->studentPassword = $getPassword;
        $getParticulars->password_date = date('Y/m/d');
        $getParticulars->email = $request->input('student_email');
        
        $getParticulars->birth_Date = $getDate;
        $getParticulars->address = $request->input('student_address');
        $getParticulars->status = $request->input('student_status');
        $getParticulars->courseID = $request->input('course_id');
        $getParticulars->admission_Year = $request->input('admissionYear');
        $getParticulars->cumulative_GPA = 0;
        
       $getParticulars->save();

        Session::flash('success', 'Student Particular have been successfully created!');
        return redirect()->route('students.index');
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

    public function edit_student()
    {
        $id = Auth::user()->name;
        $edit_Student = DB::table('student')
            ->where('studentID' ,'=', $id)
            ->get();

        return view('studentParticular.editParticular')->with('edit_student', $edit_Student);
    }

    public function student_grade()
    {
        $user_id = Auth::user()->name;
        Log::info($user_id);
        //  error_log($id);
        $gradeList = DB::table('result')
            ->join('test', 'result.testID', '=', 'test.testID')
            ->select('result.*', 'test.testName')
            ->where('studentID', '=', $user_id)
            ->where('status', '=', "Published")
            ->get();

        return view('testGrades.studResults')->with('gradeList', $gradeList);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_Student = DB::table('student')
            ->where('studentID' ,'=', $id)
            ->get();

        return view('studentParticular.editParticular')->with('edit_student', $edit_Student);
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
        Log::info($input);
        $getUserRole = Auth::user()->role;
       // Log::info($getUserRole);
        
        $getDate = $request['birthDate'];
        $getDate = date('Y-m-d', strtotime($getDate));
        date_default_timezone_set('Asia/Singapore');

        $getPassword = $request['stud_Pass'];
        Log::info($getPassword);

        // If Password remain the same in Database
        if(Student::where('studentID', '=', $id)->where('studentPassword', '=', $getPassword)->exists())
        {
            // Validate Role is Admin/ Lecturer / HOD
            if($getUserRole == "Admin" || $getUserRole == "Lecturer" || $getUserRole == "Hod"){
                Log::info(' NON Student w/o Password');

                DB::table('student')
                ->where('studentID', $id)
                ->update([
                    'studentName' => $request['student_Name'],
                    'birth_Date' => $getDate,
                    'address' => $request['student_address'],
                    'status'  =>$request['student_status']
                ]);
            
            }
            else
            {
                Log::info('Student w/o Password');

                DB::table('student')
                ->where('studentID', $id)
                ->update([
                    'studentName' => $request['student_Name'],
                    'birth_Date' => $getDate,
                    'address' => $request['student_address']
                ]);
            }

         }else{

            // If Password is different in Database
            $this->validate($request,[

                'stud_Pass' => 'required|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?#&])[A-Za-z\d$@$!%*?#&]{7,}$/',
            ]);

             //Validate Role is Admin/ Hod / Lecturer
            if($getUserRole == "Admin" ||  $getUserRole =="Lecturer" ||  $getUserRole =="Hod")
            {
                //Log::info('NON Student with Password');
                DB::table('student')
                    ->where('studentID', $id)
                    ->update([
                        'studentName' => $request['student_Name'],
                        'birth_Date' => $getDate,
                        'address' => $request['student_address'],
                        'status'  =>$request['student_status'],
                        'studentPassword' => $getPassword,
                        'password_Date'  => date('Y/m/d')
                    ]);

            }
            else{
                // Student update personal particulars
                Log::info('Student with Password');
                DB::table('student')
                ->where('studentID', $id)
                ->update([
                    'studentName' => $request['student_Name'],
                    'birth_Date' => $getDate,
                    'address' => $request['student_address'],
                    'studentPassword' => $getPassword,
                    'password_Date'  => date('Y/m/d')
                ]);
        
                }

            $hashedPassword = Hash::make($getPassword);    
        
                // Update Password at User Table
                DB::table('users')
                    ->where('name', $id)
                    ->update([
                        'password' => $hashedPassword
                    ]);

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
    public function destroy($student_id)
    {
        $getStudentID = $student_id;
        Log::info($getStudentID);
        if(Student::where('studentID', '=' , $getStudentID)->where('status', '=', 'Expel')->exists()){

            DB::table('students')
            ->where('studentID', $getStudentID)
            ->delete();
            
            // Remove Student Account
            DB::table('users')
                ->where('name', $getStudentID)
                ->delete();
                
            Session::flash('success', 'Student particular has been successfully deleted');

            return redirect()->route('students.index');

        }
        else{
            Session::flash('unsuccess', 'Student is still enrolled to a Course' );
            return redirect()->back();
        }
    }


    public function archive_student($archive_id)
    {
        Log::info($archive_id);
        
        $retrieve_GraduateStudent = DB::table('student')
                        ->where('studentID', $archive_id)
                        ->get();

        $retrieve_GradStudentResults = DB::table('result')
                        ->join('test', 'result.testID', '=', 'test.testID')
                        ->join('module', 'result.moduleID', '=', 'module.moduleID')
                        ->where('studentID', $archive_id)
                        ->get();

     
        foreach($retrieve_GradStudentResults as $retrieve_Result){

            // Insert Graduate Test Result
            DB::table('alumni_tests')
                ->insert([
                    'testName' =>$retrieve_Result->testName,
                    'grade' => $retrieve_Result->grade,
                    'moduleName' => $retrieve_Result->moduleName,
                    'moduleID' => $retrieve_Result->moduleID,
                    'alumniID' => $retrieve_Result->studentID 
                ]);
        }

        // Remove entry from student table
        DB::table('student')
            ->where('studentID', $archive_id)
            ->delete();

        $archived_Grad = new Alumni_Student();

         // insert into Alumni table   
        foreach($retrieve_GraduateStudent as $retrieve_GradStud){
            
            $archived_Grad->alumniID = $retrieve_GradStud->studentID;
            $archived_Grad->alumniName = $retrieve_GradStud->studentName;
            $archived_Grad->dob = $retrieve_GradStud->birth_Date;
            $archived_Grad->address = $retrieve_GradStud->address;
            $archived_Grad->nric = $retrieve_GradStud->student_Nric;
            $archived_Grad->addmissionYear = $retrieve_GradStud->admission_Year;
            $archived_Grad->courseID = $retrieve_GradStud->courseID;

            $archived_Grad->save();
        }                

        Session::flash('success', 'Student particular has been successfully archived!');
        return redirect()->route('students.index');
    }

    public function viewGraduateStudents(){
        
        $getGradStudents = Alumni_Student::all();

        return view('graduateStudents.indexGraduateStudent')->with('gradStudents', $getGradStudents);
    }

    public function showGradStudentInfo($alumni_id){

        //Log::info($alumni_id);
        $viewGradInfo = DB::table('alumni')
                            ->join('alumni_tests', 'alumni.alumniID' , '=' , 'alumni_tests.alumniID')
                            ->where('alumni.alumniID', $alumni_id)
                            ->distinct()
                            ->get();
                            
        return view('graduateStudents.viewGraduateStudent')->with('viewGrad_Info', $viewGradInfo);
    }

}   