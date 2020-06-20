<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoogieMessage extends Model
{
    protected $table = 'boogie_messages';
    protected $guarded = ['id'];
    public $timestamps = false;
}
