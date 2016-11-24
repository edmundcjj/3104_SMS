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
use Session;

class AdminController extends Controller
{
  public function viewAccountList()
   {
    $getDate = date('Y-m-d');
   //   Log::info($getDate);

       // Retrieve all Student User
    $getStudentAccount = DB::table('student')
                            ->join('users','users.name' ,'=', 'student.studentID')
                            ->get();

       // Retrieve all Lecturer User
    $getLecturerAccount = DB::table('lecturer')
                            ->join('users','users.name', '=', 'lecturer.lecturerID')
                            ->get();


    return view('Admin.accountList')->with('studentAcc', $getStudentAccount)->with('lecturerAcc', $getLecturerAccount)->with('currentDate', $getDate);

   }


   public function sendReminder($getName, $getEmail)
    {
       // Log::info($getEmail);
         $data = array(
        'name' => $getName,
        );

        Mail::send('Admin.reminder', $data, function ($message) use ($getEmail) {
        $message->from('no-reply@edutech.com', 'Admin');
        $message->to($getEmail)->subject('Notification to change Password');
    });
      
        Session::flash('success', 'Email Reminder have been send!');

       // return redirect()->route('user_account.index');
        return redirect()->back();
    }

    public function index(){
         return view('Admin.backupOperation');
    }

    public function backupApplication(){
        exec('cd '.storage_path().'\app\http---localhost');
        Artisan::call('backup:run',['--only-files' => true]);
        $path = (exec('cd '.storage_path().'\app\http---localhost & for /r %i in (*) do echo %i'));
        return response()->download($path);

        return back();
    }

    public function backupDatabase(){
        exec('cd '.storage_path().'\app\http---localhost');
        Artisan::call('backup:run',['--only-db' => true]);
        $path = (exec('cd '.storage_path().'\app\http---localhost & for /r %i in (*) do echo %i'));
        return response()->download($path);

        return back();
    }

    public function acc_index(){
        Session::forget('success_unlock');
        $display_accList = DB::table('users')
        ->where('status','=', 'locked')
        ->orderBy('name', 'asc')
        ->paginate(50);

        return view('Admin.locked_account')->with('display_accList', $display_accList);
    }

    public function unlock_acc($uid){
        Session::flash('success_unlock', $uid.'\'s account has been unlocked!');
        error_log($uid);
        DB::table('users')->where('name',$uid)->update(['status'=>'open']);
        return view('unlockresult');

    }

}
