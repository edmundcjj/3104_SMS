<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'result', 'feedback', 'status', 'testID', 'studentID'
    ];

    public $table = 'result';

    public $timestamps = false;
}
