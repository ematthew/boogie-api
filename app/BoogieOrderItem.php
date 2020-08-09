<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoogieOrderItem extends Model
{
    protected $table = 'boogie_order_items';
    protected $guarded = ['id'];
    public $timestamps = false;


    //Executed when loading model
	// public static function boot()
	// {
	//      parent::boot();

	//      BoogieOrderItem::saving(function($user){
	//          $order_tiem->item_brand = 'None';
	//      });
	// }
}
