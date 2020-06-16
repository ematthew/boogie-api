<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiTestController extends Controller
{
    public function index()
    {
    	$data = [
			'status'    => 'success',
			'message'	=> 'Welcome to Boogie Api'
		];
		return response()->json($data);
    }
}
