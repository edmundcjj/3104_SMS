<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use App\Http\Requests;
use App\Grade;
use App\Student;
use App\Course;
use App\Module;
use App\Test;
use App\User;
use Auth;
use DB;
use Hash;
use Session;
use Log;
use Carbon;
use Crypt;
use App\Result;
use Date;


class GradeController extends Controller
{
    // Admin update of Marks
//    public function updateRecommendedResults(Request $request, $result_id, $currentGrade)
//    {
//
//        $newInputValue = $request->input('newResultValue');
//
//        // Current mark + New mark
//        $currentGrade = $currentGrade + $newInputValue;
//        // Log::info($currentGrade);
//
//        // Validate if the Updated Grade is above 100 marks
//        if($currentGrade > 100){
//            $currentGrade = 100;
//        }
//
//        // Update of Grade changes and result status.
//        DB::table('result')
//            ->where('resultID', $result_id)
//            ->update(['grade' =>  $currentGrade,
//                'recommendResult' =>'Updated' ]);
//
//        $testID = DB::table('result')->where('resultID', $result_id)->pluck('testID');
//
//        //check whether there are any more recommendation
//        $checkRecommendation = DB::table('result')
//            ->where('testID', '=', $testID)
//            ->where('recommendResult', '=', "Approved")
//            ->get();
//
//
//        if ( $checkRecommendation ->isEmpty() )
//        {
//            //no recommendation
//            DB::table('test')
//                ->where('testID', $testID)
//                ->update(['status' => "Updated"]);
//        }
//
//        Session::flash('success', 'Adding of marks have been updated!');
//
//        return redirect('execute_list');
//
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function recommend_index()
    {
        $hodID = Auth::user()->name;
        $cid = DB::table('course')->where('lecturerID', $hodID)->pluck('courseID');
        $recommendList = DB::table('result')
        ->join('test', 'result.testID', '=', 'test.testID')
        ->join('module', 'result.moduleID', '=', 'module.moduleID')
        ->select('result.*', 'test.testName', 'module.courseID')
        ->whereNotNull('recommendation')
        ->where('recommendResult', 'Pending')
        ->where('courseID', $cid->first())
        ->get();
        error_log($recommendList);
        return view('testGrades.recommendation')->with('recommendList', $recommendList);
    }

    public function execute_list()
    {
//        error_log('exe!');
//        $recommendList = DB::table('result')
//        ->join('test', 'result.testID', '=', 'test.testID')
//        ->select('result.*', 'test.testName')
//        ->whereIn('recommendResult', ['Approve'])->get();

        $recommendList = DB::table('result')
            ->join('student', 'result.studentID', '=', 'student.studentID')
            ->join('module', 'result.moduleID', '=', 'module.moduleID' )
            ->join('course', 'student.courseID', '=', 'course.courseID')
            ->join('test','result.testID', '=', 'test.testID')
            //->where('result.recommendation', '!=', ' ')
            ->where('result.recommendResult', 'Approved')
            ->orderBy('result.moduleID', 'asc')
            ->get();
        return view('testGrades.executeRecommendList')->with('recommendList', $recommendList);
    }

    public function executeapprove($rid)
    {
        error_log('Approved!');
        $prev = DB::table('result')->where('resultID', $rid)->pluck('grade');
        DB::table('result')->where('resultID', $rid)->update(['grade'=>50, 'recommendResult'=>'Prev '. $prev->first()]);
        $sid = DB::table('result')->where('resultID', $rid)->pluck('studentID');
        Session::flash('success', 'Executed Recommendation for '.$sid->first().'!');


        $testID = DB::table('result')->where('resultID', $rid)->pluck('testID');

        //check whether there are any more recommendation
        $checkRecommendation = DB::table('result')
            ->where('testID', '=', $testID)
            ->where('recommendResult', '=', "Approved")
            ->get();


        if ( $checkRecommendation ->isEmpty() )
        {
            //no recommendation left
            DB::table('test')
                ->where('testID', $testID)
                ->update(['status' => "Updated"]);
        }
        return view('testGrades.execute');
    }
    public function executereject($rid)
    {
        error_log('Rejected!');
        DB::table('result')->where('resultID', $rid)->update(['recommendResult'=>'Rejected']);
        $sid = DB::table('result')->where('resultID', $rid)->pluck('studentID');
        Session::flash('success', 'Executed Recommendation for '.$sid->first().'!');
        return view('testGrades.execute');
    }

//    public function approve($rid)
//    {
//        error_log('Approved!');
//        DB::table('result')->where('resultID', $rid)->update(['recommendResult'=>'Approve']);
//        $sid = DB::table('result')->where('resultID', $rid)->pluck('studentID');
//        Session::flash('success', 'Approved Recommendation for '.$sid->first().'!');
//        return view('testGrades.statusresult');
//    }

    public function approve($rid)
    {
        error_log('Approved!');
        DB::table('result')->where('resultID', $rid)->update(['recommendResult'=>'Approved']);

        $sid = DB::table('result')->where('resultID', $rid)->pluck('studentID');
        Session::flash('success', 'Approved Recommendation for '.$sid->first().'!');


        return view('testGrades.statusresult');
    }

//    public function reject($rid)
//    {
//        error_log('Rejected!');
//        DB::table('result')->where('resultID', $rid)->update(['recommendResult'=>'Rejected']);
//        $sid = DB::table('result')->where('resultID', $rid)->pluck('studentID');
//        Session::flash('success', 'Rejected Recommendation for '.$sid->first().'!');
//        return view('testGrades.statusresult');
//    }

    public function reject($rid)
    {
        error_log('Rejected!');
        DB::table('result')->where('resultID', $rid)->update(['recommendResult'=>'Rejected']);

        //check whether any more recommendation for the particular test
        $testID = DB::table('result')->where('resultID', $rid)->pluck('testID');
        $checkRecommendation = DB::table('result')
            ->where('testID', '=', $testID)
            ->where('recommendResult', '=', "Pending")
            ->get();

        if ( $checkRecommendation ->isEmpty() )
        {
            //Check got any approve status
            $checkAnyApprove = DB::table('result')
                ->where('testID', '=', $testID)
                ->where('recommendResult', '=', "Approved")
                ->get();

            if ( $checkAnyApprove ->isEmpty() )
            {
                DB::table('test')
                    ->where('testID', $testID)
                    ->update(['status' => "Updated"]);
            }
        }

        $sid = DB::table('result')->where('resultID', $rid)->pluck('studentID');
        Session::flash('success', 'Rejected Recommendation for '.$sid->first().'!');
        return view('testGrades.statusresult');
    }

    //view a test grade
    public function details_index($tid)
    {
        Session::forget('success');
        $testList = DB::table('result')
            ->where('result.testID','=', $tid)
            ->get();

        /*$classStudentList = DB::table('students')
                        ->where('courseID' ,'=', '3313')
                        ->get(); */

        $deadlineDate = DB::table('test')
            ->where('testID','=', $tid)
            ->get();

        foreach ($deadlineDate as $date)
        {
            $teststatus = $date->status;
        }

        foreach ($deadlineDate as $d)
        {
            $value = $d->grade_Deadline;
        }

        $deadline = Carbon\Carbon::parse($value);

        $today_date = Carbon\Carbon::today()->format("Y-m-d");


        return view('testGrades.viewGradeDetails')->with('testList', $testList)->with('currenttime', $today_date)->with('deadlinetime', $deadline)->with('teststatus', $teststatus);
    }

    //edit a student grade
    public function details_edit($id)
    {
        $editGrade = DB::table('result')
            ->where('resultID' ,'=', $id)
            ->get();


        return view('testGrades.editGradeDetails')->with('editgrade', $editGrade);
    }

    //update a student grade
    public function details_update(Request $request, $id)
    {

        $testID = DB::table('result')->where('resultID', $id)->pluck('testID');

        DB::table('result')
            ->where('resultID', $id)
            ->update(['grade' => $request->input('grade'),
                'recommendation' => $request->input('recommendation')]);

        DB::table('test')
            ->where('testID', $testID->first())
            ->update(['status' => "Saved"]);

        return redirect()->intended('grades_details/'.$testID->first())->with('message', 'Grade have been updated successfully!');



    }

    //submit student grade to hod
    public function details_submit($resultID)
    {

        $testID = DB::table('result')->where('resultID', $resultID)->pluck('testID');

        //check whether there are any recommendation
        $checkRecommendation = DB::table('result')
            ->where('testID', '=', $testID)
            ->where('recommendation', '!=', null)
            ->where('recommendation', '!=', "")
            ->get();


        if ( $checkRecommendation ->isEmpty() )
        {
            //no recommendation
            DB::table('test')
                ->where('testID', $testID)
                ->update(['status' => "Updated"]);
        }
        else {

            //got recommendation
            DB::table('test')
                ->where('testID', $testID)
                ->update(['status' => "Pending"]);

            DB::table('result')
                ->where('testID', '=', $testID)
                ->where('recommendation', '!=', null)
                ->where('recommendation', '!=', "")
                ->update(['recommendResult' => "Pending"]);

        }

        return redirect()->route('view_grades.index')->with('message', 'Grades submitted to Hod successfully!');
    }

//    public function hod_details_index($tid)
//    {
//        $testList = DB::table('result')
//            ->where('testID','=', $tid)
//            ->get();
//
//        /*$classStudentList = DB::table('students')
//                        ->where('courseID' ,'=', '3313')
//                        ->get(); */
//        return view('hodTestGrades.hodViewGradeDetails')->with('testList', $testList);
//    }

    //hod view student grade
    public function hod_details_index($tid)
    {
        $testID = $tid;
        $testList = DB::table('result')
            ->join('test', 'test.testID', '=', 'result.testID')
            ->where('result.testID','=', $tid)
            ->get();

        /*$classStudentList = DB::table('students')
                        ->where('courseID' ,'=', '3313')
                        ->get(); */

        return view('hodTestGrades.hodViewGradeDetails')->with('testList', $testList)->with('passID', $testID);
    }


    public function moderateGrade($id)
    {
        $testID = $id;
        return view('hodTestGrades.moderateGrade', ['testID' => $testID]);
    }

    public function moderateStore(Request $request, $id)
    {
        $retrieveInput = $request->input('valueID');
        $retrieveID = $id;

        $convertInput = (((int)$retrieveInput)/100)+1;

        $rows = DB::table('Result')->where('testID', '=', $retrieveID)->get();
        foreach($rows as $row) {
            $studentValue = $row->studentID;
            $resultValue = $row->grade;
            $updatedValue =  $convertInput*$resultValue;

            if ($updatedValue > 100)
            {
                $updatedValue = 100;
            }

            Result::where('studentID', '=', $studentValue)->
            where('testID', '=', $retrieveID)->
            update(['grade' => $updatedValue]);
        }

        DB::table('test')
            ->where('testID', '=', $retrieveID)
            ->update(['status' => 'Moderated']);

        return redirect()->intended('hod_grades_details/'.$retrieveID)->with('message', 'Grades moderated successfully!');
    }

    //hod grade publish
    public function publish($id)
    {
        $testID = $id;

        DB::table('test')
            ->where('testID', '=', $testID)
            ->update(['status' => 'Published']);

        return redirect()->route('hod_view_grades.index')->with('message', 'Grades publish successfully!');

    }

    public function choose_mod()
    {
        Session::forget('success');
        $lid = Auth::user()->name;
        $moduleList = DB::table('module')
            ->where('lecturerID',$lid)
            ->pluck('moduleName', 'moduleID');
        /*$classStudentList = DB::table('students')
                        ->where('courseID' ,'=', '3313')
                        ->get(); */
        return view('testGrades.chooseMod')->with('moduleList', $moduleList);
    }

    public function create_index($mid)
    {
        Session::forget('success');
        error_log($mid);
        $lid = Auth::user()->name;
        $moduleList = DB::table('module')
            ->where('lecturerID',$lid)
            ->pluck('moduleName', 'moduleID');
        $mod = DB::table('module')
            ->where('moduleID','=', $mid)
            ->pluck('moduleName', 'moduleID');
        error_log($mod);
        $cid = DB::table('module')
            ->where('moduleID','=', $mid)
            ->pluck('courseID');
        error_log($cid);
        $classList = DB::table('student')
            ->where('courseID','=', $cid)
            ->get();
        /*$classStudentList = DB::table('students')
                        ->where('courseID' ,'=', '3313')
                        ->get(); */
        return view('testGrades.createGrade')->with('moduleList', $moduleList)->with('mod', $mod)->with('cid', $cid)->with('classList', $classList);
    }

     public function hod_view_index()
    {

        $lid = Auth::user()->name;
        $cid = DB::table('course')->where('lecturerID', $lid)->pluck('courseID');
        $testsList = DB::table('test')
            ->leftJoin('module', 'test.moduleID', 'module.moduleID')
            ->where('module.courseID',$cid->first())
            ->get();
        error_log($testsList);
        return view('hodTestGrades.hodViewGrade')->with('testsList', $testsList);
    }

    public function view_index()
    {

        $lid = Auth::user()->name;
        $testsList = DB::table('test')
            ->leftJoin('module', 'test.moduleID', 'module.moduleID')
            ->where('module.lecturerID',$lid)
            ->get();
            
        return view('testGrades.viewGrade')->with('testsList', $testsList);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grades = $request->input('grade');
        $recommend = $request->input('feedback');
        $students = $request->input('studentID');
        $testName = $request->input('testName');
        $modID = $request->input('moduleID');
        //$today = Carbon\Carbon::today('Asia/Singapore');
        //$mytime = Carbon\Carbon::createFromFormat('YYYY-mm-dd', $today ,'Asia/Singapore');

        $mytime = Carbon\Carbon::today()->addDays(7);
        error_log($mytime);
        $year = $mytime->year;
        $month = $mytime->month;
        $day = $mytime->day;
        $date = $year.'-'.$month.'-'.$day;
        error_log($date);
        $getDate = date('Y-m-d', strtotime($date));
        $lid = Auth::user()->name;
        $newTest = new Test;
        $newTest->testName = $testName;
        $newTest->status = 'Saved';
        $newTest->moduleID = $modID;
        $newTest->lecturerID = $lid;
        $newTest->grade_Deadline = $getDate;

        $newTest->save();
        $testingID = DB::table('test')
            ->where('testName', $testName)
            ->pluck('testID');
        foreach($testingID as $t){
            $a = $t;
        }
        error_log($a);
        error_log(count($grades));
        foreach($grades as $g=>$f){
            /*
            $addGrades = new Grade();
            $addGrades->testID = $a;
            $addGrades->moduleID = $modID;
            $addGrades->grade = $f;
            $addGrades->studentID = $students[$g];
            $addGrades->recommendation = $recommend[$g];
            error_log("grades");
            error_log($f);
            error_log("id");
            error_log($students[$g]);
            error_log("fb");
            error_log($recommend[$g]);
            $addGrades->save();
            */
            if($recommend[$g]==null){
               /* DB::table('result')->insert([
                'testID' => $a, 
                'moduleID' => $modID,
                'grade' => $f, 
                'studentID' => $students[$g],
                'recommendation' => 'NULL',
                'recommendResult' => 0 ]);*/
                error_log('null');
                $addGrades = new Grade();
                $addGrades->testID = $a;
                $addGrades->moduleID = $modID;
                $addGrades->grade = $f;
                $addGrades->studentID = $students[$g];
                $addGrades->recommendation = NULL;
                $addGrades->recommendResult = 0;
                $addGrades->save();
            }
            else{
                error_log('not null');
               /* DB::table('result')->insert([
                'testID' => $a, 
                'moduleID' => $modID,
                'grade' => $f, 
                'studentID' => $students[$g],
                'recommendation' => $recommend[$g],
                'recommendResult' => 'Pending' ]);*/
                $addGrades = new Grade();
                $addGrades->testID = $a;
                $addGrades->moduleID = $modID;
                $addGrades->grade = $f;
                $addGrades->studentID = $students[$g];
                $addGrades->recommendation = $recommend[$g];
//                $addGrades->recommendResult = 'Pending';
                $addGrades->recommendResult = 0;
                $addGrades->save();
            }

        }
        $testsList = DB::table('test')
            ->leftJoin('module', 'test.moduleID', 'module.moduleID')
            ->where('module.lecturerID',$lid)
            ->get();
            
        Session::flash('success', 'Grades uploaded!');
        return view('testGrades.viewGrade')->with('testsList', $testsList);
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

        public function compute_gpa($studentid)
    {
        //Declare variable
        $sumAccGradePointCredit = 0;
        $sumAccTrimesterCredit = 0;
        $displayTrimester = array();

        //get student id
        $user_id = $studentid;

        //find the course that the student is enrolled in
        $courseEnrolled = DB::table('student')
            ->where('studentID','=', $user_id)
            ->pluck('courseID');

        //retrieve out the course
        foreach ($courseEnrolled as $course)
        {
            $retrieveCourse = $course;
        }

        //find all trimester that the student take
        $allTrimesterTaken = DB::table('module')
            ->join('result', 'result.moduleID','module.moduleID')
            ->where('result.studentID','=', $user_id)
            ->where('module.courseID','=', $retrieveCourse)
            ->distinct()
            ->orderBy('module.trimester', 'asc')
            ->pluck('module.trimester');

        //retrieve out each trimester one by one
        foreach($allTrimesterTaken as $trimester)
        {
            //Declare Variable
            $sumGradePointCredit = 0;
            $sumTrimesterCredit = 0;

            //retrieve the module taken by the student for the trimester
            $trimesterModuleTaken = DB::table('module')
                ->where('courseID', '=', $retrieveCourse)
                ->where('trimester', '=', $trimester)
                ->pluck('moduleID');

            //retrieve out each module one by one
            foreach ($trimesterModuleTaken as $module)
            {
                //Declare Variable
                $sumResult = 0;
                $computeAllResultMark = array();

                //retrieve number of test of the module
                $numOfTest = DB::table('test')
                    ->where('moduleID', '=', $module)
                    ->count();

                $eachTestWeightage = (100 / $numOfTest)/100;

                //retrieve all the individual result
                //assume one result is one test
                $allResultMark = DB::table('result')
                    ->where('studentID', '=', $user_id)
                    ->where('moduleID', '=', $module)
                    ->pluck('grade');

                //retrieve out each result one by one
                foreach ($allResultMark as $individualResult)
                {
                    $computeAllResultMark[] = $individualResult * ($eachTestWeightage);
                }

                //sum up total mark for a test result
                for ($i =0; $i<count($computeAllResultMark); $i++)
                {
                    $sumResult = $sumResult + $computeAllResultMark[$i];
                }

                //Get grade point of a module based on sum of mark
                if ($sumResult <= 20 && $sumResult >= 0)
                {
                    $gradePoint = 1;
                }
                else if ($sumResult <= 40 && $sumResult >= 21)
                {
                    $gradePoint = 2;
                }
                if ($sumResult <= 60 && $sumResult >= 41)
                {
                    $gradePoint = 3;
                }
                if ($sumResult <= 80 && $sumResult >= 61)
                {
                    $gradePoint = 4;
                }
                if ($sumResult <= 100 && $sumResult >= 81)
                {
                    $gradePoint = 5;
                }

                //retrieve credit of the module
                $moduleCredit = DB::table('module')
                    ->where('moduleID','=', $module)
                    ->first()
                    ->credit_Unit;

                //grade point credit of a module
                $gradePointCredit = $gradePoint*$moduleCredit;

                //sum up all grade point credit for the trimester
                $sumGradePointCredit = $sumGradePointCredit + $gradePointCredit;
                //sum up all module credit for the trimester
                $sumTrimesterCredit = $sumTrimesterCredit + $moduleCredit;
            }
            //Compute trimester gpa
            $trimesterGPA[] = $sumGradePointCredit/$sumTrimesterCredit;

            //sum up accumulated grade point credit
            $sumAccGradePointCredit = $sumAccGradePointCredit + $sumGradePointCredit;
            //sum up accumulated credit
            $sumAccTrimesterCredit = $sumAccTrimesterCredit + $sumTrimesterCredit;

            //Compute cumulative gpa
            $cumulativeGPA[] = $sumAccGradePointCredit/$sumAccTrimesterCredit;
        }

        //Get the trimester that will be displayed
        foreach ($allTrimesterTaken as $trimester)
        {
            $displayTrimester[] = $trimester;
        }

        $encryptedCumulativeGPA = Crypt::encrypt($cumulativeGPA[count($cumulativeGPA)-1]);

        //Store into the database
        DB::table('student')
            ->where('studentID', '=', $user_id)
            ->update(['cumulative_GPA' => $encryptedCumulativeGPA]);

        return view('testGrades.studentViewGPA')->with("trimester", $displayTrimester)->with("trimestergpa", $trimesterGPA)->with("cumulativegpa", $cumulativeGPA);
    }

}
