<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BoogieFeedback;

class FeedbackController extends Controller
{
    public function create(Request $request)
    {
    	
            $feedback                      = new BoogieFeedback();
            $feedback->user_id             = $request->user_id;
            $feedback->feedback            = $request->feedback;
            $feedback->type                = $request->type;
            $feedback->row_status          = $request->row_status;
            $feedback->created_on          = now();
            $feedback->updated_on          = now();
            $feedback->utc_created_on      = now();
            $feedback->utc_updated_on      = now();
            $feedback->deleted_on          = now();
            $feedback->utc_deleted_on      = now();          
            $feedback->save();

            $data = [
                'status'    => 'success',
                'message'   => 'feedback added'
            ];

		return response()->json($data);
    }

    public function fetchall(Request $request)
    {
    	$feedbacks = BoogieFeedback::limit(5)->orderBy('id', 'DESC')->get();

    	$data = [
			'status'    => 'success',
			'message'	=> 'fetching successful',
			'feedbacks'		=> $feedbacks,

		];
		return response()->json($data);
    }

    public function fetchone(Request $request, $id)
    {
    	$feedback = BoogieFeedback::find($id);

    	return $feedback;
    }

    public function update(Request $request, $id)

    {
    		$feedback                      = BoogieFeedback::find($id);
            $feedback->user_id             = $request->user_id;
            $feedback->feedback            = $request->feedback;
            $feedback->type                = $request->type;
            $feedback->row_status          = $request->row_status;          
            $feedback->update();

            $data = [
                'status'    => 'success',
                'message'   => 'feedback has been updated'
            ];

		return response()->json($data);
    }


    public function delete(Request $request, $id)
    {
    	$feedback = BoogieFeedback::find($id);
       	$feedback->delete();

       	$data = [
                'status'    => 'success',
                'message'   => 'feedback has been deleted successfully'
            ];

    	return response()->json($data);
    }
    
}
