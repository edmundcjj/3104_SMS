<?php

namespace App\Http\Controllers;

use App\Lecturer;
use App\Course;
use App\Module;
use Illuminate\Http\Request;
use App\Http\Requests\hodCourseRequest;
use Auth;
use DB;

class hodCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
//        $result = array('courseID'=>"",'courseName'=>"",
//            'module'=>array('moduleID'=>'','moduleName'=>'','lecturerID'=>''));

//        $courseParticulars = Course::all();
        $lecturerUsername = Auth::user()->name;
        $courseParticulars = DB::table('course')
            ->join('users', 'users.name', '=', 'course.lecturerID')
            ->where('users.name', '=', $lecturerUsername)
            ->get();

        foreach($courseParticulars as $cp)
        {
            $courseID = $cp->courseID;
            $courseName = $cp->courseName;
            $moduleParticulars = DB::table('module')
                ->join('course', 'course.courseID', '=', 'module.courseID')
                ->where('course.courseID', '=', $courseID)
                ->get();

            $result = array(
                'courseID'=>$courseID,
                'courseName'=>$courseName,
                'module'=>$moduleParticulars
            );
        }

        //dd($result);

//        for($i = 0; $i < count($courseParticulars); $i++)
//        {
//            $courseID = $courseParticulars[$i]->courseID;
//            $courseName = $courseParticulars[$i]->courseName;
//
//            //dd($result);
//            $moduleParticulars = DB::table('module')
//                ->join('course', 'course.courseID', '=', 'module.courseID')
//                ->where('course.courseID', '=', $courseID)
//                ->get();
//            //dd($moduleParticulars);
//            $result = array(
//                'courseID'=>$courseID,
//                'courseName'=>$courseName,
//
//            );
//            for($j = 0; $j < count($moduleParticulars); $j++){
//                $moduleID = $moduleParticulars[$j]->moduleID;
//                $moduleName = $moduleParticulars[$j]->moduleName;
//                $mLecturerID = $moduleParticulars[$j]->lecturerID;
//                $result = array(
//                    'module'=> array(
//                        'moduleID'=>$moduleID,
//                        'moduleName'=>$moduleName,
//                        'lecturerID'=>$mLecturerID
//                    )
//                );
//            }
//
//            dd($result);
//            $result[$i]->courseID = $courseID;
//            $result[$i]->courseName = $courseName;


//            dd($moduleParticulars);





//        }

        //dd($result);

        return view('courseParticular.index', ['array'=>$result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courseParticular.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(hodCourseRequest $request)
    {
        Course::create($request->all());
        return redirect()->route('courseParticular.index')->with('message', 'item has been added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $courseParticular)
    {
        return view('courseParticular.show', compact('courseParticular'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $courseParticular)
    {
        return view('courseParticular.edit', compact('courseParticular'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(hodCourseRequest $request, Course $courseParticular)
    {
        $courseParticular->update($request->all());
        return redirect()->route('courseParticular.index')->with('message', 'item has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $courseParticular)
    {
        $courseParticular->delete();
        return redirect()->route('courseParticular.index')->with('message', 'item has been deleted successfully.');
    }
}
