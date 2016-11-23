<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OTP extends Model
{
    public $table = 'otp';

    public $timestamps = false;

    protected $fillable = ['otp', 'userID'];
}
