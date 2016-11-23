<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Mail;
use DB;
use App\OTP;

class AuthController extends Controller
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
        $type = substr($uid, 0, 2);
        $email = '';
        error_log($type);
        if(strcmp($type, 'ST')==0){
            return view('home');
        }
        elseif(strcmp($type, 'LT')==0){
            $getemail = DB::table('lecturer')->where('lecturerID', '=', $uid)->pluck('email');
            $email = $getemail->first();
            error_log($email);
        }
        elseif(strcmp($type, 'Ad')==0){
            $getemail = DB::table('admin')->where('adminName', '=', $uid)->pluck('email');
            $email = $getemail->first();
            error_log($email);
        }
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
         ->from('no-reply-edutech@singapore.edu.sg','EduTech');
      });

        return view('otp.otp');
    }
}
