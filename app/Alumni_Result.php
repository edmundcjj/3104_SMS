<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumni_Result extends Model
{
    public $table = 'alumni_tests';

    public $timestamps = false;

    protected $fillable = ['testName', 'grade' ,'moduleName','moduleID','alumniID'];
}
