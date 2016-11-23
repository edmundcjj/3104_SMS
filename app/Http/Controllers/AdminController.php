<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Http\Requests;
use App\User;
use App\Student;
use App\Lecturer;
use Auth;
use DB;
use Log;

class AdminController extends Controller
{
//    public function viewAccountList()
//    {
//    	$getDate = date('Y-m-d');
//    	Log::info($getDate);
//
//        // Retrieve all Student User
//    	$getStudentAccount = DB::table('student')
//    							->join('users','users.name' ,'=', 'student.studentID')
//    							->get();
//
//    	// foreach($getStudentAccount as $get_S)
//    	// {
//    	// 	Log::info($get_S->password_date);
//    	// 	$hi = (strtotime($get_S->password_date) - strtotime($getDate))/(86400);
//    	// 	Log::info($hi);
//    	// }
//
//        // Retrieve all Lecturer User
//    	$getLecturerAccount = DB::table('lecturer')
//    							->join('users','users.name', '=', 'lecturer.lecturerID')
//    							->get();
//
//
//    	return view('adminTask.accountList')->with('studentAcc', $getStudentAccount)->with('lecturerAcc', $getLecturerAccount)->with('currentDate', $getDate);
//
//    }
//
//
//    public function sendReminder($getName)
//    {
//
//        Log::info($getName);
//
//        Log::info('hi');
//        return ('hi');
//    }

    public function index(){
         return view('Admin.backupOperation');
    }

    public function backupApplication(){
        exec('cd '.storage_path().'\app\http---localhost & del * /S /Q');
        Artisan::call('backup:run',['--only-files' => true]);
        $path = (exec('cd '.storage_path().'\app\http---localhost & for /r %i in (*) do echo %i'));
        return response()->download($path);

        return back();
    }

    public function backupDatabase(){
        exec('cd '.storage_path().'\app\http---localhost & del * /S /Q');
        Artisan::call('backup:run',['--only-db' => true]);
        $path = (exec('cd '.storage_path().'\app\http---localhost & for /r %i in (*) do echo %i'));
        return response()->download($path);

        return back();
    }

    public function acc_index(){
        $display_accList = DB::table('users')
        ->where('status','=', 'locked')
        ->orderBy('name', 'asc')
        ->paginate(50);

        return view('Admin.locked_account')->with('display_accList', $display_accList);
    }

    public function unlock_acc($uid){
        $display_accList = DB::table('users')
        ->where('status','=', 'locked')
        ->orderBy('name', 'asc')
        ->paginate(50);
        return view('Admin.locked_account')->with('display_accList', $display_accList);

    }

}
