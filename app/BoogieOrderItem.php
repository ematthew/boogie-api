<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoogieOrderItem extends Model
{
    protected $table = 'boogie_order_items';
    protected $guarded = ['id'];
    public $timestamps = false;
}
