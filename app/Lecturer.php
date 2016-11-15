<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    public $table = 'lecturer';

    public $timestamps = false;

    protected $fillable = ['lecturerID', 'lecturerName','lecturerPassword','lecturer_Nric', 'password_date', 'email' ,'address', 'birth_Date', 'position'];
}
