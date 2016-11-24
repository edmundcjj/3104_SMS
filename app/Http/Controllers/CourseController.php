<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Course;
use App\Lecturer;
use App\Student;
use DB;
use Log;
use Session;
use Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Retrieve a List of HOD
        $displayCourse = DB::table('course')
                        ->join('lecturer', 'course.lecturerID', '=', 'lecturer.lecturerID' )
                        ->orderBy('courseName', 'asc')
                        ->paginate(30);

        $displayHod = DB::table('lecturer')
                               ->select('lecturerID', 'lecturerName')
                               ->where('position', '=' , 'HOD')
                               ->get();
        
        return view('courses.viewCourse')->with('displaycourse', $displayCourse)->with('displayhod', $displayHod);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate_CourseID = $request->input('course_id');
        $validate_CourseName = $request->input('course_name');

        if(Course::where('courseID', '=', $validate_CourseID )->exists()){
            Session::flash('unsuccess', 'Course ID exists! Please enter a different ID.');
            return redirect()->back();
        }
        else if(Course::where('courseName', '=', $validate_CourseName )->exists()){
            Session::flash('unsuccess', 'CourseName exists! Please enter a different Course Name.' );
            return redirect()->back();
        }

        $insert_Course = new Course;

        // $insert_Course->courseID = $request->input('course_id');
        // $insert_Course->courseName = $request->input('course_name');
        $insert_Course->courseID = $validate_CourseID;
        $insert_Course->courseName = $validate_CourseName;
        $insert_Course->lecturerID = $request->input('hod_ID');


        $insert_Course->save();

        Session::flash('success', 'Course have been successfully created!');
        return redirect()->route('course.index');
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
    public function edit($id)
    {
        $edit_Course = DB::table('course')
                        ->join('lecturer', 'course.lecturerID', '=', 'lecturer.lecturerID')
                        ->where('courseID' ,'=', $id)
                        ->get();

        $edit_Hod = DB::table('lecturer')
                               ->select('lecturerID', 'lecturerName')
                               ->where('position', '=' , 'HOD')
                               ->get();

         return view('courses.editCourse')->with('edit_course', $edit_Course)->with('edit_hod' , $edit_Hod);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $course_id)
    {
        $course = DB::table('course')->where('courseID' ,$course_id)->first();
       
        $validate_CourseName = $request->input('course_name');
       
       // if Course Name remain unchanged
        if($validate_CourseName == $course->courseName){
            DB::table('course')
                ->where('courseID', $course_id)
                ->update(['lecturerID' => $request->input('lecturer_id')]);

            Session::flash('success', 'Course have been successfully updated!');
            return redirect()->route('course.index');

        }
        // change in Course Name
        else
        {
        // Validate for duplicate Course Name in other rows
        if(Course::where('courseID', '!=', $course->courseID )->where('courseName', $validate_CourseName)->exists() ){
                 Session::flash('unsuccess', 'Duplicate Course Name exists! Please use another Course Name.' );
                 
                return redirect()->back(); 
            }
            else{

                DB::table('course')
                ->where('courseID', $course_id)
                ->update(['lecturerID' => $request->input('lecturer_id'),
                        'courseName' => $validate_CourseName
                    ]);
               
            Session::flash('success', 'Course have been successfully updated!');
            return redirect()->route('course.index');
                }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($course_id)
    {
        // Verify if there are Student still in this Course
        if(Student::where('courseID', '=', $course_id)->count() > 0)
        {
            Session::flash('nsuccess', 'Course cannot be Deleted! There are still Students enrolled in this Course!' );
            return redirect()->back();
        }

        // Remove Course Entry Row
        DB::table('course')
            ->where('courseID', '=', $course_id)
            ->delete();

        Session::flash('success', 'Course has been successfully deleted');

        return redirect()->route('course.index');

    }

    /**
     * Display a listing of the in-charge course.
     *
     * @return \Illuminate\Http\Response
     */
    public function course_incharge()
    {
        // Retrieve a List of in-charge course
        $hodUsername = Auth::user()->name;
        $inchargeCourse = DB::table('course')
            ->join('users', 'users.name', '=', 'course.lecturerID')
            ->where('users.name', '=', $hodUsername)
            ->orderBy('courseID', 'asc')
            ->get();

        return view('courses.inchargeCourse')->with('inchargecourse', $inchargeCourse);
    }
}
