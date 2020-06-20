<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoogieCategory extends Model
{
    protected $table = 'boogie_category';
    protected $guarded = ['id'];
    public $timestamps = false;
}
