<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = [
        'moduleID', 'moduleName', 'courseID', 'lecturerID', 'credit_Unit'
    ];

    public $table = 'module';

    public $timestamps = false;


    protected $primaryKey = 'moduleID';
}
