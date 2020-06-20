<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoogieMarketer extends Model
{
    protected $table = 'boogie_marketer';
    protected $guarded = ['id'];
    public $timestamps = false;
}
