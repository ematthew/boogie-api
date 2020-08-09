<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BoogieOrder;
use App\BoogieOrderItem;

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

    public function orderByList(Request $request)
    {
        # code...
        $order                           = new BoogieOrder();
        $order->order_list_type          = $request->order_list_type;
        $order->customer_id              = $request->customer_id;
        $order->store_id                 = $request->store_id;
        $order->dispatcher_id            = $request->dispatcher_id;
        $order->store_owner_id           = $request->store_owner_id;
        $order->order_price              = $request->order_price;
        $order->delivery_charge          = $request->delivery_charge;
        $order->order_payment_status     = 1;
        $order->order_payment_option     = 1;
        $order->order_delivery_option    = 1;
        $order->order_delivery_address   = 1;
        $order->status                   = $request->status;
        $order->reminder_status          = 1;
        $order->reward_point             = $request->reward_point;
        $order->loyality_card            = $request->loyality_card;
        $order->order_lat                = 0.33440;
        $order->order_long               = 0.67756;
        $order->created_on               = now();
        $order->updated_on               = now();
        $order->order_accepted_on        = now();
        $order->order_prepared_on        = now();
        $order->order_dispatched_on      = now();
        $order->order_completed_on       = now();
        $order->order_cancelled_on       = now();
        $order->utc_created_on           = now();
        $order->utc_updated_on           = now();
        $order->deleted_on               = now();
        $order->utc_deleted_on           = now();          
        if($order->save()){
            $item_lists = $request->item_lists;
            foreach ($item_lists as $item) {

                $order_item = new BoogieOrderItem();
                $order_item->order_id                 = $order->id;
                $order_item->item_name                = $item['title'];
                $order_item->item_qty                 = $item['quantity'];
                $order_item->item_brand               = $item['brand'];
                $order_item->items_Availability       = $request->items_Availability ?? 'AVAILABLE';
                $order_item->item_status              = $request->item_status ?? 'active';
                $order_item->created_on               = now();
                $order_item->updated_on               = now();
                $order_item->utc_created_on           = now();
                $order_item->utc_updated_on           = now();
                $order_item->deleted_on               = now();
                $order_item->utc_deleted_on           = now();          
                $order_item->save();
            }

            $data = [
                "status"     => "success",
                "message"    => "Your request has been received, awaiting delivery!" 
            ];
        }else{
            $data = [
                "status"     => "error",
                "message"    => "Error processing order request" 
            ];
        }

        // return response
        return response()->json($data, 200);
    }

    public function orderByImage(Request $request)
    {
        $order                           = new BoogieOrder();
        $order->order_list_type          = $request->order_list_type;
        $order->customer_id              = $request->customer_id;
        $order->store_id                 = $request->store_id;
        $order->dispatcher_id            = $request->dispatcher_id;
        $order->store_owner_id           = $request->store_owner_id;
        $order->order_price              = $request->order_price;
        $order->delivery_charge          = $request->delivery_charge;
        $order->order_payment_status     = 1;
        $order->order_payment_option     = 1;
        $order->order_delivery_option    = 1;
        $order->order_delivery_address   = 1;
        $order->status                   = $request->status;
        $order->reminder_status          = 1;
        $order->reward_point             = $request->reward_point;
        $order->loyality_card            = $request->loyality_card;
        $order->order_lat                = 0.33440;
        $order->order_long               = 0.67756;
        $order->created_on               = now();
        $order->updated_on               = now();
        $order->utc_created_on           = now();
        $order->order_accepted_on        = now();
        $order->order_prepared_on        = now();
        $order->order_dispatched_on      = now();
        $order->order_completed_on       = now();
        $order->order_cancelled_on       = now();
        $order->utc_updated_on           = now();
        $order->deleted_on               = now();
        $order->utc_deleted_on           = now();          
        if($order->save()){
            // upload videos
            if($request->multiple == "yes"){
                # code...
                foreach ($request->file('photos') as $photo) {
                    $image_path = 'assets/images';
                    $destination = public_path($image_path);
                    $extension = $photo->getClientOriginalExtension();
                    $filename  = 'order-image-' . time() . '.' . $extension;
                    
                    // move image
                    $photo->move($destination, $filename);

                    $order_item = new BoogieOrderItem();
                    $order_item->order_id                 = $order->id;
                    $order_item->item_name                = 'Not specified';
                    $order_item->item_qty                 = '1';
                    $order_item->item_brand               = 'EMPTY';
                    $order_item->media_name               = $filename;
                    $order_item->media_path               = $image_path;
                    $order_item->items_Availability       = $request->items_Availability ?? 'AVAILABLE';
                    $order_item->item_status              = $request->item_status ?? 'active';
                    $order_item->item_brand               = $request->item_brand;
                    $order_item->created_on               = now();
                    $order_item->updated_on               = now();
                    $order_item->utc_created_on           = now();
                    $order_item->utc_updated_on           = now();
                    $order_item->deleted_on               = now();
                    $order_item->utc_deleted_on           = now();          
                    $order_item->save();
                }
            }elseif($request->multiple == "no"){
                $photo = $request->file('photos');
                $image_path = 'assets/images';
                $destination = public_path($image_path);
                $extension = $photo->getClientOriginalExtension();
                $filename  = 'order-image-' . time() . '.' . $extension;
                
                // move image
                $photo->move($destination, $filename);

                $order_item = new BoogieOrderItem();
                $order_item->order_id                 = $order->id;
                $order_item->item_name                = 'Not specified';
                $order_item->item_qty                 = '1';
                $order_item->item_brand               = 'Not specified';
                $order_item->media_name               = $filename;
                $order_item->media_path               = $image_path;
                $order_item->items_Availability       = $request->items_Availability ?? 'AVAILABLE';
                $order_item->item_status              = $request->item_status ?? 'active';
                $order_item->item_brand               = $request->item_brand ?? 'Not specified';
                $order_item->created_on               = now();
                $order_item->updated_on               = now();
                $order_item->utc_created_on           = now();
                $order_item->utc_updated_on           = now();
                $order_item->deleted_on               = now();
                $order_item->utc_deleted_on           = now();          
                $order_item->save();
            }

            $data = [
                "status"     => "success",
                "message"    => "Your request has been received, awaiting delivery!" 
            ];
        }else{
            $data = [
                "status"     => "error",
                "message"    => "Error processing order request" 
            ];
        }

        // return response
        return response()->json($data, 200);
    }

    public function orderByVoice(Request $request)
    {
        # code...
        $order                           = new BoogieOrder();
        $order->order_list_type          = $request->order_list_type;
        $order->customer_id              = $request->customer_id;
        $order->store_id                 = $request->store_id;
        $order->dispatcher_id            = $request->dispatcher_id;
        $order->store_owner_id           = $request->store_owner_id;
        $order->order_price              = $request->order_price;
        $order->delivery_charge          = $request->delivery_charge;
        $order->order_payment_status     = 1;
        $order->order_payment_option     = 1;
        $order->order_delivery_option    = 1;
        $order->order_delivery_address   = 1;
        $order->status                   = $request->status;
        $order->reminder_status          = 1;
        $order->reward_point             = $request->reward_point;
        $order->loyality_card            = $request->loyality_card;
        $order->order_lat                = 0.33440;
        $order->order_long               = 0.67756;
        $order->created_on               = now();
        $order->updated_on               = now();
        $order->utc_created_on           = now();
        $order->order_accepted_on        = now();
        $order->order_prepared_on        = now();
        $order->order_dispatched_on      = now();
        $order->order_completed_on       = now();
        $order->order_cancelled_on       = now();
        $order->utc_updated_on           = now();
        $order->deleted_on               = now();
        $order->utc_deleted_on           = now();          
        if($order->save()){
            // upload videos
            if($request->multiple == "yes"){
                # code...
                $recordings = $request->file('audio_recordings');
                foreach ($recordings as $audio) {
                    $destination = public_path('assets/audio');
                    $extension = $audio->getClientOriginalExtension();
                    $filename  = 'order-sound-' . time() . '.' . $extension;
                    // move image
                    $photo->move($destination, $filename);

                    $order_item = new BoogieOrderItem();
                    $order_item->order_id                 = $order->id;
                    $order_item->media_name               = $filename;
                    $order_item->media_path               = $destination;
                    $order_item->items_Availability       = $request->items_Availability ?? 'AVAILABLE';
                    $order_item->item_status              = $request->item_status ?? 'active';
                    $order_item->item_brand               = $request->item_brand;
                    $order_item->created_on               = now();
                    $order_item->updated_on               = now();
                    $order_item->utc_created_on           = now();
                    $order_item->utc_updated_on           = now();
                    $order_item->deleted_on               = now();
                    $order_item->utc_deleted_on           = now();          
                    $order_item->save();
                }
            }elseif($request->multiple == "no"){
                $audio = $request->file('audio_recordings');
                $destination = public_path('assets/audio');
                $extension = $audio->getClientOriginalExtension();
                $filename  = 'order-sound-' . time() . '.' . $extension;
                
                // move audio
                $audio->move($destination, $filename);

                $order_item = new BoogieOrderItem();
                $order_item->order_id                 = $order->id;
                $order_item->media_name               = $filename;
                $order_item->media_path               = $destination;
                $order_item->items_Availability       = $request->items_Availability ?? 'AVAILABLE';
                $order_item->item_status              = $request->item_status ?? 'active';
                $order_item->item_brand               = $request->item_brand ?? 'Not specified';
                $order_item->created_on               = now();
                $order_item->updated_on               = now();
                $order_item->utc_created_on           = now();
                $order_item->utc_updated_on           = now();
                $order_item->deleted_on               = now();
                $order_item->utc_deleted_on           = now();          
                $order_item->save();
            }

            $data = [
                "status"     => "success",
                "message"    => "Your request has been received, awaiting delivery!" 
            ];
        }else{
            $data = [
                "status"     => "error",
                "message"    => "Error processing order request" 
            ];
        }

        // return response
        return response()->json($data, 200);
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
