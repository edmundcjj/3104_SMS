<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    public $table = 'test';

    public $timestamps = false;

    protected $fillable = ['testName','status', 'moduleID', 'lecturerID', 'grade_Deadline'];
}
