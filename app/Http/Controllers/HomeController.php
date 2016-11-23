<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Mail;
use Session;
use App\OTP;
use Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uid = Auth::user()->name;
        error_log($uid);
        error_log("checkcheck");
        $type = substr($uid, 0, 2);
        $email = '';
        error_log($type);


        if(strcmp($type, 'ST')==0){
            $oldDate = DB::table('student')->where('studentID', $uid)->pluck('password_date');
            $mytime = Carbon\Carbon::now();
            $getDate = date('Y-m-d', strtotime($mytime));
            if($oldDate->first() > $getDate){
                DB::table('users')->where('name',$uid)->update(['status'=>'locked']);
                error_log('locked');
                Auth::logout();
                return view('auth.login');
            }
            return view('home');
        }
        elseif(strcmp($type, 'LT')==0){
            $oldDate = DB::table('student')->where('studentID', $uid)->pluck('password_date');
            $mytime = Carbon\Carbon::now();
            $getDate = date('Y-m-d', strtotime($mytime));
            if($oldDate->first() > $getDate){
                DB::table('users')->where('name',$uid)->update(['status'=>'locked']);
                Auth::logout();
                error_log('locked');
                return view('auth.login');
            }
            $getemail = DB::table('lecturer')->where('lecturerID', '=', $uid)->pluck('email');
            $email = $getemail->first();
            error_log($email);

            $r1 = rand(0, 9);
            $r2 = rand(0, 9);
            $r3 = rand(0, 9);
            $r4 = rand(0, 9);
            $r5 = rand(0, 9);
            $r6 = rand(0, 9);
            $otp = $r1.$r2.$r3.$r4.$r5.$r6;
            error_log($otp);
            $setOTP = new OTP();
            $setOTP->otp = $otp;
            $setOTP->userID = $uid;
            $setOTP->save();
            $data = array('otp'=>$otp, 'email'=>$email);
            Mail::send('email', $data, function($message) use($data){
                $message
                ->to($data['email'])
                ->subject('Login Verification')
                ->from('no-reply-edutech@singapore.edu.sg','EduTech');});

            return view('otp');
        }
        elseif(strcmp($type, 'Ad')==0){
            $getemail = DB::table('admin')->where('adminName', '=', $uid)->pluck('email');
            $email = $getemail->first();
            error_log($email);
            $r1 = rand(0, 9);
            $r2 = rand(0, 9);
            $r3 = rand(0, 9);
            $r4 = rand(0, 9);
            $r5 = rand(0, 9);
            $r6 = rand(0, 9);
            $otp = $r1.$r2.$r3.$r4.$r5.$r6;
            error_log($otp);
            $setOTP = new OTP();
            $setOTP->otp = $otp;
            $setOTP->userID = $uid;
            $setOTP->save();
            $data = array('otp'=>$otp, 'email'=>$email);
            Mail::send('email', $data, function($message) use($data){
                $message
                ->to($data['email'])
                ->subject('Login Verification')
                ->from('no-reply-edutech@singapore.edu.sg','EduTech');});

            return view('otp');
        }
    }

    public function check_otp(Request $request)
    {
        $getOTP = $request->input('otpTxt');
        $uid = Auth::user()->name;
        $rotp = DB::table('otp')->where('userID', '=', $uid)->pluck('otp');
        $checkotp = $rotp->first();

        if(strcmp($getOTP, $checkotp)!=0){
            Session::flash('unsuccess_otp', 'OTP does not match!' );
            return view('otp');
        }
        Session::forget('unsuccess_otp');
        DB::table('otp')->where('userID','=',$uid)->delete();
        return view('home');

    }

    public function resend_otp()
    {
        $uid = Auth::user()->name;
        $r1 = rand(0, 9);
        $r2 = rand(0, 9);
        $r3 = rand(0, 9);
        $r4 = rand(0, 9);
        $r5 = rand(0, 9);
        $r6 = rand(0, 9);
        $otp = $r1.$r2.$r3.$r4.$r5.$r6;
        error_log($otp);
        DB::table('otp')
        ->where('userID', $uid)
        ->update(['otp'=> $otp]);
        $type = substr($uid, 0, 2);
        $email = '';
        if(strcmp($type, 'LT')==0){
            $getemail = DB::table('lecturer')->where('lecturerID', '=', $uid)->pluck('email');
            $email = $getemail->first();
            error_log($email);
        }
        elseif(strcmp($type, 'Ad')==0){
            $getemail = DB::table('admin')->where('adminName', '=', $uid)->pluck('email');
            $email = $getemail->first();
            error_log($email);
        }

        $data = array('otp'=>$otp, 'email'=>$email);
        Mail::send('email', $data, function($message) use($data){
         $message
         ->to($data['email'])
         ->subject('Login Verification')
         ->from('no-reply-edutech@singapore.edu.sg','EduTech');
      });
        return view('otp');
    }

    public function otp_fail(){
        Auth::logout();
        return view('auth.login');
    }
}
