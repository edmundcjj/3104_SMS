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

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function recommend_index()
    {
        $hodID = Auth::user()->name;
        $cid = DB::table('course')->where('lecturerID', $hodID)->
        pluck('courseID');
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
        error_log('exe!');
        $recommendList = DB::table('result')
        ->join('test', 'result.testID', '=', 'test.testID')
        ->select('result.*', 'test.testName')
        ->whereIn('recommendResult', ['Approve', 'Reject'])->get();
        return view('testGrades.executeRecommendList')->with('recommendList', $recommendList);
    }

    public function executeapprove($rid)
    {
        error_log('Approved!');
        $prev = DB::table('result')->where('resultID', $rid)->pluck('grade');
        DB::table('result')->where('resultID', $rid)->update(['grade'=>50, 'recommendResult'=>'Prev '. $prev->first()]);
        $sid = DB::table('result')->where('resultID', $rid)->pluck('studentID');
        Session::flash('success', 'Executed Recommendation for '.$sid->first().'!');
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

    public function approve($rid)
    {
        error_log('Approved!');
        DB::table('result')->where('resultID', $rid)->update(['recommendResult'=>'Approve']);
        $sid = DB::table('result')->where('resultID', $rid)->pluck('studentID');
        Session::flash('success', 'Approved Recommendation for '.$sid->first().'!');
        return view('testGrades.statusresult');
    }

    public function reject($rid)
    {
        error_log('Rejected!');
        DB::table('result')->where('resultID', $rid)->update(['recommendResult'=>'Rejected']);
        $sid = DB::table('result')->where('resultID', $rid)->pluck('studentID');
        Session::flash('success', 'Rejected Recommendation for '.$sid->first().'!');
        return view('testGrades.statusresult');
    }
    
    public function details_index($tid)
    {
        $testList = DB::table('result')
            ->where('testID','=', $tid)
            ->get();

        /*$classStudentList = DB::table('students')
                        ->where('courseID' ,'=', '3313')
                        ->get(); */
        return view('testGrades.viewGradeDetails')->with('testList', $testList);
    }

    public function hod_details_index($tid)
    {
        $testList = DB::table('result')
            ->where('testID','=', $tid)
            ->get();

        return view('hodTestGrades.hodViewGradeDetails')->with('testList', $testList);
    }

    public function choose_mod()
    {
        $lid = Auth::user()->name;
        $moduleList = DB::table('module')
            ->where('lecturerID',$lid)
            ->pluck('moduleName', 'moduleID');

        return view('testGrades.chooseMod')->with('moduleList', $moduleList);
    }

    public function create_index($mid)
    {
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

        $lid = Auth::user()->name;
        $newTest = new Test;
        $newTest->testName = $testName;
        $newTest->status = 'Pending';
        $newTest->moduleID = $modID;
        $newTest->lecturerID = $lid;
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
        }
        $testsList = DB::table('test')
            ->where('lecturerID','=', $lid)
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

}
