<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoogieFeedback extends Model
{
    protected $table = 'boogie_feedback';
    protected $guarded = ['id'];
    public $timestamps = false;
}
