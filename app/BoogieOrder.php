<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BoogieOrderItem;

class BoogieOrder extends Model
{
    protected $table = 'boogie_order';
    protected $guarded = ['id'];
    public $timestamps = false;


    /*
    |-----------------------------------------
    | SHOW
    |-----------------------------------------
    */
    public function order_items(){
    	// body
    	return $this->hasMany(BoogieOrderItem::class, "order_id", "id");
    }
}
