<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
        error_log($type);
        if(strcmp($type, 'ST')==0){
            return view('home');
        }
        $r1 = rand(0, 9);
        $r2 = rand(0, 9);
        $r3 = rand(0, 9);
        $r4 = rand(0, 9);
        $r5 = rand(0, 9);
        $r6 = rand(0, 9);
        $otp = $r1.$r2.$r3.$r4.$r5.$r6;
        error_log($otp);
        return view('otp.otp');
    }
}
