<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BoogieNotification;

class NotificationController extends Controller
{
    public function create(Request $request)
    {
    	
            $notification                    		 = new BoogieNotification();
            $notification->order_id           	     = $request->order_id;
            $notification->user_id            	     = $request->user_id;
            $notification->notification_message      = $request->notification_message;
            $notification->status            	     = $request->status;
            $notification->created_on                = now();
            $notification->updated_on         	     = now();
            $notification->utc_created_on    		 = now();
            $notification->utc_updated_on    		 = now();
            $notification->deleted_on        		 = now();
            $notification->utc_deleted_on    		 = now();          
            $notification->save();

            $data = [
                'status'    => 'success',
                'message'   => 'notification has been added'
            ];

		return response()->json($data);
    }

    public function fetchall(Request $request)
    {
    	$notifications = BoogieNotification::limit(5)->orderBy('id', 'DESC')->get();

    	$data = [
			'status'    => 'success',
			'message'	=> 'fetching successful',
			'notifications'		=> $notifications,

		];
		return response()->json($data);
    }

    public function fetchone(Request $request, $id)
    {
    	$notification = BoogieNotification::find($id);

    	return $notification;
    }

    public function update(Request $request, $id)

    {
            $notification                          = BoogieNotification::find($id);
            $notification->order_id           	 = $request->order_id;
            $notification->user_id            	 = $request->user_id;
            $notification->notification_message    = $request->notification_message;
            $notification->status            	     = $request->status;         
            $notification->update();

            $data = [
                'status'    => 'success',
                'message'   => 'notification has been updated'
            ];

		return response()->json($data);
    }


    public function delete(Request $request, $id)
    {
    	$notification = BoogieNotification::find($id);
       	$notification->delete();

       	$data = [
                'status'    => 'success',
                'message'   => 'notification has been deleted successfully'
            ];

    	return response()->json($data);
    }
    
}
