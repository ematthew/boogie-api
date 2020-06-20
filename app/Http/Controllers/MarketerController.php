<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BoogieMarketer;

class MarketerController extends Controller
{
    public function create(Request $request)
    {
    	
            $marketer                      = new BoogieMarketer();
            $marketer->marketer_name       = $request->marketer_name;
            $marketer->marketer_email      = $request->marketer_email;
            $marketer->marketer_number     = $request->marketer_number;
            $marketer->row_status          = $request->row_status;
            $marketer->created_on          = now();
            $marketer->updated_on          = now();
            $marketer->utc_created_on      = now();
            $marketer->utc_updated_on      = now();
            $marketer->deleted_on          = now();
            $marketer->utc_deleted_on      = now();          
            $marketer->save();

            $data = [
                'status'    => 'success',
                'message'   => 'marketer added'
            ];

		return response()->json($data);
    }

    public function fetchall(Request $request)
    {
    	$marketers = BoogieMarketer::limit(5)->orderBy('id', 'DESC')->get();

    	$data = [
			'status'    => 'success',
			'message'	=> 'fetching successful',
			'marketers'		=> $marketers,

		];
		return response()->json($data);
    }

    public function fetchone(Request $request, $id)
    {
    	$marketer = BoogieMarketer::find($id);

    	return $marketer;
    }

    public function update(Request $request, $id)

    {
    		$marketer                      = BoogieMarketer::find($id);
            $marketer->marketer_name       = $request->marketer_name;
            $marketer->marketer_email      = $request->marketer_email;
            $marketer->marketer_number     = $request->marketer_number;
            $marketer->row_status          = $request->row_status;          
            $marketer->update();

            $data = [
                'status'    => 'success',
                'message'   => 'marketer has been updated'
            ];

		return response()->json($data);
    }


    public function delete(Request $request, $id)
    {
    	$marketer = BoogieMarketer::find($id);
       	$marketer->delete();

       	$data = [
                'status'    => 'success',
                'message'   => 'marketer has been deleted successfully'
            ];

    	return response()->json($data);
    }
}
