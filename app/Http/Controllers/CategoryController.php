<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BoogieCategory;

class CategoryController extends Controller
{
   public function create(Request $request)
    {
    	
            $category                     		 = new BoogieCategory();
            $category->location_id        		 = $request->location_id;
            $category->category_name     		 = $request->category_name;
            $category->category_description      = $request->category_description;
            $category->category_status           = $request->category_status;
            $category->category_img     		 = "avatar";
            $category->category_img_path   		 = public_path('avatars');
            $category->created_on          		 = now();
            $category->updated_on         		 = now();
            $category->utc_created_on     		 = now();
            $category->utc_updated_on     		 = now();
            $category->deleted_on         		 = now();
            $category->utc_deleted_on     		 = now();          
            $category->save();

            $data = [
                'status'    => 'success',
                'message'   => 'category added'
            ];

		return response()->json($data);
    }

    public function fetchall(Request $request)
    {
    	$categorys = BoogieCategory::limit(5)->orderBy('id', 'DESC')->get();

    	$data = [
			'status'    => 'success',
			'message'	=> 'fetching successful',
			'categorys'		=> $categorys,

		];
		return response()->json($data);
    }

    public function fetchone(Request $request, $id)
    {
    	$category = BoogieCategory::find($id);

    	return $category;
    }

    public function update(Request $request, $id)

    {
    		$category                            = BoogieCategory::find($id);
            $category->location_id        		 = $request->location_id;
            $category->category_name     		 = $request->category_name;
            $category->category_description      = $request->category_description;
            $category->category_status           = $request->category_status;
            $category->category_img     		 = "avatar";
            $category->category_img_path   		 = public_path('avatars');    
            $category->update();

            $data = [
                'status'    => 'success',
                'message'   => 'category has been updated'
            ];

		return response()->json($data);
    }


    public function delete(Request $request, $id)
    {
    	$category = BoogieCategory::find($id);
       	$category->delete();

       	$data = [
                'status'    => 'success',
                'message'   => 'category has been deleted successfully'
            ];

    	return response()->json($data);
    }
    }
