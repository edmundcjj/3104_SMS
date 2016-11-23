<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Course;
use App\Lecturer;
use App\Student;
use Auth;
use Mail;
use DB;
use Session;

class OTPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        return view('otp.otp');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    public function check_otp(Request $request)
    {
        $getOTP = $request->input('otpTxt');
        $uid = Auth::user()->name;
        error_log($getOTP);
        $rotp = DB::table('otp')->where('userID', '=', $uid)->pluck('otp');
        $checkotp = $rotp->first();

        if(strcmp($getOTP, $checkotp)!=0){
            Session::flash('unsuccess_otp', 'OTP does not match!' );
            return view('otp.otp');
        }
        Session::flush();
        DB::table('otp')->where('userID','=',$uid)->delete();
        return view('/home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
       
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
        return view('otp.otp');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
    }

    public function otp_fail(){
        Auth::logout();
        return view('auth.login');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {

    }
}
