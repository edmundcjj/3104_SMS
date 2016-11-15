<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $table = 'student';

    public $timestamps = false;

    protected $fillable = ['studentID' ,'studentName','student_Nric','studentPassword', 'password_date', 'email','birth_Date', 'address', 'status', 'courseID', 'admission_Year', 'cumulative_GPA'];
}
