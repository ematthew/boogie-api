<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoogieBanner extends Model
{
    protected $table = 'boogie_banner';
    protected $guarded = ['id'];
    public $timestamps = false;
}
