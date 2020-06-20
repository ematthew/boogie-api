<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoogieProduct extends Model
{
    protected $table = 'boogie_products';
    protected $guarded = ['id'];
    public $timestamps = false;
 
}
