<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    public $table = 'result';

    public $timestamps = false;

    protected $fillable = ['testID', 'moduleID', 'studentID', 'grade', 'recommendation', 'recommendResult'];
}
