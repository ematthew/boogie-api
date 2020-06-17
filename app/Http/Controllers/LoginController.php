<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BoogieUser;
use JWTAuth;
use JWTFactory;

class LoginController extends Controller
{
    /*
    |-----------------------------------------
    | LOGIN USER FROM REQUEST
    |-----------------------------------------
    */
    public function loginUser(Request $request){
    	// body
    	$user = BoogieUser::where("useremail", $request->user_email)->first();

    	if($user == null){
    		$data = [
    			"status" 	=> "error",
    			"message" 	=> "Invalid email address!" 
    		];
    	}else{

    		// validate password
    		$hash_password = md5(trim($request->user_password));
    		if($hash_password !== $user->userpassword){
    			$data = [
    				"status" 	=> "error",
    				"message" 	=> "Invalid user password!",
    			];
    		}else{
    			$token = JWTAuth::fromUser($user);

    			$data = [
		    		"status" 	=> "success",
		    		"message" 	=> "Login successful",
		    		"user"      => $user,
		    		"token"     => $token,
		    	];
    		}
    	}

    	// return response
    	return response()->json($data);
    }
}
