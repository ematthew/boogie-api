<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BoogieMessage;

class MessageController extends Controller
{
     public function create(Request $request)
    {
    	
            $message                     = new BoogieMessage();
            $message->user_id            = $request->user_id;
            $message->description        = $request->description;
            $message->status             = $request->status;
            $message->user_type          = $request->user_type;    
            $message->created_on         = now();
            $message->updated_on         = now();
            $message->utc_created_on     = now();
            $message->utc_updated_on     = now();
            $message->deleted_on         = now();
            $message->utc_deleted_on     = now();          
            $message->save();

            $data = [
                'status'    => 'success',
                'message'   => 'message added'
            ];

		return response()->json($data);
    }

    public function fetchall(Request $request)
    {
    	$messages = BoogieMessage::limit(5)->orderBy('id', 'DESC')->get();

    	$data = [
			'status'    => 'success',
			'message'	=> 'fetching successful',
			'messages'		=> $messages,

		];
		return response()->json($data);
    }

    public function fetchone(Request $request, $id)
    {
    	$message = BoogieMessage::find($id);

    	return $message;
    }

    public function update(Request $request, $id)

    {
    		$message                     = BoogieMessage::find($id);
            $message->user_id            = $request->user_id;
            $message->description        = $request->description;
            $message->status             = $request->status;
            $message->user_type          = $request->user_type;          
            $message->update();

            $data = [
                'status'    => 'success',
                'message'   => 'message has been updated'
            ];

		return response()->json($data);
    }


    public function delete(Request $request, $id)
    {
    	$message = BoogieMessage::find($id);
       	$message->delete();

       	$data = [
                'status'    => 'success',
                'message'   => 'message has been deleted successfully'
            ];

    	return response()->json($data);
    }
}
