<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoogieOrder extends Model
{
    protected $table = 'boogie_order';
    protected $guarded = ['id'];
    public $timestamps = false;
}
