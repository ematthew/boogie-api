<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoogieNotification extends Model
{
    protected $table = 'boogie_notification';
    protected $guarded = ['id'];
    public $timestamps = false;
}
