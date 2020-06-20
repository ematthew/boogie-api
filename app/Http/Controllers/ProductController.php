<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BoogieProduct;

class ProductController extends Controller
{
    public function create(Request $request)
    {
    	
            $product                     = new BoogieProduct();
            $product->product_name       = $request->product_name;
            $product->product_price      = $request->product_price;
            $product->row_status         = $request->row_status;
            $product->product_img_name   = "avatar";
            $product->product_img_path   = public_path('avatars');
            $product->created_on         = now();
            $product->updated_on         = now();
            $product->utc_created_on     = now();
            $product->utc_updated_on     = now();
            $product->deleted_on         = now();
            $product->utc_deleted_on     = now();          
            $product->save();

            $data = [
                'status'    => 'success',
                'message'   => 'product added'
            ];

		return response()->json($data);
    }

    public function fetchall(Request $request)
    {
    	$products = BoogieProduct::limit(5)->orderBy('id', 'DESC')->get();

    	$data = [
			'status'    => 'success',
			'message'	=> 'fetching successful',
			'products'		=> $products,

		];
		return response()->json($data);
    }

    public function fetchone(Request $request, $id)
    {
    	$product = BoogieProduct::find($id);

    	return $product;
    }

    public function update(Request $request, $id)

    {
    		$product                     = BoogieProduct::find($id);
            $product->product_name       = $request->product_name;
            $product->product_price      = $request->product_price;
            $product->row_status         = $request->row_status;
            $product->product_img_name   = "avatar";          
            $product->update();

            $data = [
                'status'    => 'success',
                'message'   => 'product has been updated'
            ];

		return response()->json($data);
    }


    public function delete(Request $request, $id)
    {
    	$product = BoogieProduct::find($id);
       	$product->delete();

       	$data = [
                'status'    => 'success',
                'message'   => 'product has been deleted successfully'
            ];

    	return response()->json($data);
    }
    
}
