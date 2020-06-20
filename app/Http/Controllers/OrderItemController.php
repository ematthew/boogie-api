<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BoogieOrderItem;

class OrderItemController extends Controller
{
    public function create(Request $request)
    {
    	
            $order                    		 = new BoogieOrderItem();
            $order->order_id       	 		 = $request->order_id;
            $order->item_name      		 	 = $request->item_name;
            $order->item_Qty         		 = $request->item_Qty;
            $order->media_name     			 = "avatar";
            $order->media_path      		 = public_path('avatars');
            $order->items_Availability       = $request->items_Availability;
            $order->item_status         	 = $request->item_status;
            $order->item_brand      		 = $request->item_brand;
            $order->created_on        		 = now();
            $order->updated_on         		 = now();
            $order->utc_created_on     		 = now();
            $order->order_accepted_on        = now();
            $order->order_prepared_on        = now();
            $order->order_dispatched_on      = now();
            $order->order_completed_on     	 = now();
            $order->order_cancelled_on     	 = now();
            $order->utc_updated_on     		 = now();
            $order->deleted_on         		 = now();
            $order->utc_deleted_on     		 = now();          
            $order->save();

            $data = [
                'status'    => 'success',
                'message'   => 'order added'
            ];

		return response()->json($data);
    }

    public function fetchall(Request $request)
    {
    	$orders = BoogieOrderItem::limit(5)->orderBy('id', 'DESC')->get();

    	$data = [
			'status'    => 'success',
			'message'	=> 'fetching successful',
			'orders'		=> $orders,

		];
		return response()->json($data);
    }

    public function fetchone(Request $request, $id)
    {
    	$order = BoogieOrderItem::find($id);

    	return $order;
    }

    public function update(Request $request, $id)

    {
    		$order                           = BoogieOrderItem::find($id);
            $order->order_id       	 		 = $request->order_id;
            $order->item_name      		 	 = $request->item_name;
            $order->item_Qty         		 = $request->item_Qty;
            $order->media_name     			 = "avatar";
            $order->media_path      		 = public_path('avatars');
            $order->items_Availability       = $request->items_Availability;
            $order->item_status         	 = $request->item_status;
            $order->item_brand      		 = $request->item_brand;
            $order->created_on        		 = now();
            $order->updated_on         		 = now();
            $order->utc_created_on     		 = now();
            $order->order_accepted_on        = now();
            $order->order_prepared_on        = now();
            $order->order_dispatched_on      = now();
            $order->order_completed_on     	 = now();
            $order->order_cancelled_on     	 = now();
            $order->utc_updated_on     		 = now();
            $order->deleted_on         		 = now();
            $order->utc_deleted_on     		 = now();        
            $order->update();

            $data = [
                'status'    => 'success',
                'message'   => 'order has been updated'
            ];

		return response()->json($data);
    }


    public function delete(Request $request, $id)
    {
    	$order = BoogieOrderItem::find($id);
       	$order->delete();

       	$data = [
                'status'    => 'success',
                'message'   => 'order has been deleted successfully'
            ];

    	return response()->json($data);
    }
}
