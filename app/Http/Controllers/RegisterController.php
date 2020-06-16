<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BoogieUser;

class RegisterController extends Controller
{
    public function create(Request $request)
    {
    
    	$user 						= new BoogieUser();
    	$user->username 			= $request->user_name;
    	$user->useremail 			= $request->user_email;
    	$user->user_mobile 			= $request->user_mobile;
    	$user->user_address 		= $request->user_address;
    	$user->userpassword 		= md5(trim($request->user_password));
    	$user->location_id 			= $request->location_id;
    	$user->drone_delivery 		= $request->drone_delivery;
    	$user->boogie_vip 			= $request->boogie_vip;
    	$user->payment_option_type 	= $request->payment_option_type;
    	$user->user_type			= $request->user_type;
		$user->login_type			= $request->login_type;
		$user->fcm_token			= $request->fcm_token;
		$user->device_id			= $request->device_id;
		$user->social_token			= $request->social_token;
    	$user->save();



    	$data = [
			'status'    => 'success',
			'message'	=> 'Registration successful'
		];
		return response()->json($data);
    }

    public function fetchall(Request $request)
    {
    	$users = BoogieUser::all();

    	$data = [
			'status'    => 'success',
			'message'	=> 'fetching successful',
			'users'		=> $users,

		];
		return response()->json($data);
    }
}
