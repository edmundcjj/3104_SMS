<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
   

    public $table = 'course';

    public $timestamps = false;

     protected $fillable = ['courseID', 'courseName', 'lecturerID' ];
//    protected $primaryKey = 'courseID';

}
