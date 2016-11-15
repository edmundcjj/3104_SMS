<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumni_Student extends Model
{
    public $table = 'alumni';

    public $timestamps = false;

    protected $fillable = ['alumniID', 'alumniName' ,'dob','address','nric', 'addmissionYear', 'courseID'];
}
