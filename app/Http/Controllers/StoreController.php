<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function store()
    {
    	$data = [
                'status'    => 'success',
                'message'   => 'store controller has been setup successful'
            ];
        

		return response()->json($data);
    }
}
