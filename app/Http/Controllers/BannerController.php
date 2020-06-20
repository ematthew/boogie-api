<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BoogieBanner;

class BannerController extends Controller
{
    public function create(Request $request)
    {
    	
            $banner                     = new BoogieBanner();
            $banner->location_id        = $request->location_id;
            $banner->banner_link        = $request->banner_link;
            $banner->row_status         = $request->row_status;
            $banner->banner_img         = "avatar";
            $banner->total_clicks	    = 0;
            $banner->display_status	    = $request->display_status;
            $banner->banner_img_path    = public_path('avatars');
            $banner->created_on         = now();
            $banner->updated_on         = now();
            $banner->utc_created_on     = now();
            $banner->utc_updated_on     = now();
            $banner->deleted_on         = now();
            $banner->utc_deleted_on     = now();          
            $banner->save();

            $data = [
                'status'    => 'success',
                'message'   => 'banner has been added'
            ];

		return response()->json($data);
    }

    public function fetchall(Request $request)
    {
    	$banners = BoogieBanner::limit(5)->orderBy('id', 'DESC')->get();

    	$data = [
			'status'    => 'success',
			'message'	=> 'fetching successful',
			'banners'		=> $banners,

		];
		return response()->json($data);
    }

    public function fetchone(Request $request, $id)
    {
    	$banner = BoogieBanner::find($id);

    	return $banner;
    }

    public function update(Request $request, $id)

    {
            $banner                     = BoogieBanner::find($id);
            $banner->location_id        = $request->location_id;
            $banner->banner_link        = $request->banner_link;
            $banner->row_status         = $request->row_status;
            $banner->banner_img         = "avatar";
            $banner->total_clicks	    = 0;
            $banner->display_status	    = $request->display_status;
            $banner->banner_img_path   = public_path('avatars');         
            $banner->update();

            $data = [
                'status'    => 'success',
                'message'   => 'banner has been updated'
            ];

		return response()->json($data);
    }


    public function delete(Request $request, $id)
    {
    	$banner = BoogieBanner::find($id);
       	$banner->delete();

       	$data = [
                'status'    => 'success',
                'message'   => 'banner has been deleted successfully'
            ];

    	return response()->json($data);
    }
    
}
