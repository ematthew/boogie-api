<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoogieUser extends Model
{
    protected $table = 'boogie_user';
    protected $guarded = ['id'];
    public $timestamps = false;
    protected $hidden =	['userpassword'];
}

