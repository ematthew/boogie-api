<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoogieLocation extends Model
{
    protected $table = 'boogie_location';
    protected $guarded = ['id'];
    public $timestamps = false;
}
