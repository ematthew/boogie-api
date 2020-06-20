<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BoogieOrder;

class OrderController extends Controller
{
    public function create(Request $request)
    {
    	
            $order                    		 = new BoogieOrder();
            $order->order_list_type       	 = $request->order_list_type;
            $order->customer_id      		 = $request->customer_id;
            $order->store_id         		 = $request->store_id;
            $order->dispatcher_id      		 = $request->dispatcher_id;
            $order->store_owner_id         	 = $request->store_owner_id;
            $order->order_price      		 = $request->order_price;
            $order->delivery_charge          = $request->delivery_charge;
            $order->order_payment_status     = 1;
            $order->order_payment_option     = 1;
            $order->order_delivery_option    = 1;
            $order->order_delivery_address   = 1;
            $order->status      		     = $request->status;
            $order->reminder_status          = 1;
            $order->reward_point      		 = $request->reward_point;
            $order->loyality_card      		 = $request->loyality_card;
            $order->order_lat            	 = 0.33440;
            $order->order_long           	 = 0.67756;
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
    	$orders = BoogieOrder::limit(5)->orderBy('id', 'DESC')->get();

    	$data = [
			'status'    => 'success',
			'message'	=> 'fetching successful',
			'orders'		=> $orders,

		];
		return response()->json($data);
    }

    public function fetchone(Request $request, $id)
    {
    	$order = BoogieOrder::find($id);

    	return $order;
    }

    public function update(Request $request, $id)

    {
    		$order                     = BoogieOrder::find($id);
            $order->order_list_type       	 = $request->order_list_type;
            $order->customer_id      		 = $request->customer_id;
            $order->store_id         		 = $request->store_id;
            $order->dispatcher_id      		 = $request->dispatcher_id;
            $order->store_owner_id         	 = $request->store_owner_id;
            $order->order_price      		 = $request->order_price;
            $order->delivery_charge          = $request->delivery_charge;
            $order->reward_point      		 = $request->reward_point;
            $order->loyality_card      		 = $request->loyality_card;
            $order->status      		     = $request->status;
            $order->order_payment_status     = 1;
            $order->order_payment_option     = 1;
            $order->order_delivery_option    = 1;
            $order->order_delivery_address   = 1;
            $order->reminder_status          = 1;
            $order->order_lat            	 = 0.33440;
            $order->order_long           	 = 0.67756;
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
    	$order = BoogieOrder::find($id);
       	$order->delete();

       	$data = [
                'status'    => 'success',
                'message'   => 'order has been deleted successfully'
            ];

    	return response()->json($data);
    }
}
