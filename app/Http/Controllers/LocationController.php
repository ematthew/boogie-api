<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BoogieLocation;

class LocationController extends Controller
{
   public function create(Request $request)
    {
    	
            $location                      = new BoogieLocation();
            $location->location_name       = $request->location_name;
            $location->location_status     = $request->location_status;
            $location->created_on          = now();
            $location->updated_on          = now();
            $location->utc_created_on      = now();
            $location->utc_updated_on      = now();
            $location->deleted_on          = now();
            $location->utc_deleted_on      = now();          
            $location->save();

            $data = [
                'status'    => 'success',
                'message'   => 'location added'
            ];

		return response()->json($data);
    }

    public function fetchall(Request $request)
    {
    	$locations = Boogielocation::limit(5)->orderBy('id', 'DESC')->get();

    	$data = [
			'status'    => 'success',
			'message'	=> 'fetching successful',
			'locations'		=> $locations,

		];
		return response()->json($data);
    }

    public function fetchone(Request $request, $id)
    {
    	$location = Boogielocation::find($id);

    	return $location;
    }

    public function update(Request $request, $id)

    {
    		$location                      = Boogielocation::find($id);
            $location->location_name       = $request->location_name;
            $location->location_status     = $request->location_status;          
            $location->update();

            $data = [
                'status'    => 'success',
                'message'   => 'location has been updated'
            ];

		return response()->json($data);
    }


    public function delete(Request $request, $id)
    {
    	$location = Boogielocation::find($id);
       	$location->delete();

       	$data = [
                'status'    => 'success',
                'message'   => 'location has been deleted successfully'
            ];

    	return response()->json($data);
    }

}
