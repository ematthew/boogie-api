<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\NotifyResetPasswordLink;
use App\BoogieUser;
use App\PasswordReset;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DB;
use Mail;

class PasswordResetController extends Controller
{
    /*
    |-----------------------------------------
    | SHOW
    |-----------------------------------------
    */
    public function sendLink(Request $request){
    	// body
    	$email = $request->email;
    	$email_exist = BoogieUser::where("useremail", $email)->first();
    	if($email_exist !== null){
    		// body
            $reset_password = DB::table('password_resets')->where("email", $email)->first();   
            if($reset_password !== null){
                DB::table('password_resets')->update([
                    'email' => $email,
                    'token' => Str::random(50),
                    'created_at' => Carbon::now()
                ]);

                $data = [
                    "status"    => "success",
                    "message"   => "Password link has been reset and sent to ".$email 
                ];
            }else{

                DB::table('password_resets')->insert([
                    'email' => $email,
                    'token' => Str::random(50),
                    'created_at' => Carbon::now()
                ]);

                $data = [
                    "status"    => "success",
                    "message"   => "Password link has been sent to ".$email
                ];
            }

            // send mail
            $mail_data = PasswordReset::where("email", $request->email)->first();
            $mail_data->url = env('APP_URL').'/api/reset/password/?token='.$mail_data->token;

            Mail::to($request->email)->send(new NotifyResetPasswordLink($mail_data));
    	
    	}else{

    		$data = [
    			"status" 	=> "error",
    			"message" 	=> "Sorry! we could not find $email" 
    		];
    	}

    	// return response
    	return response()->json($data, 200);
    }

    /*
    |-----------------------------------------
    | SHOW
    |-----------------------------------------
    */
    public function resetPassword(Request $request){
    	// body
    	$verify_token = PasswordReset::where("token", $request->token)->first();
    	if($verify_token == null){
    		$data = [
    			"status" 	=> "error",
    			"message" 	=> "Token expired!" 
    		];
    	}elseif($verify_token->created_at >= Carbon::now()->addHours(6)){
    		$data = [
    			"status" 	=> "error",
    			"message" 	=> "Token expired!" 
    		];
    	}elseif($request->password !== $request->confirm_password){
    		$data = [
    			"status" 	=> "error",
    			"message" 	=> "Password did not match, try again!" 
    		];
    	}else{
    		// change user password 
    		$user = BoogieUser::where("useremail", $verify_token->email)->first();
    		if($user !== null){
    			$user->userpassword = md5(trim($request->password));
    			$user->update();

    			$data = [
    				"status" 	=> "success",
    				"message" 	=> "Password reset was successful!" 
    			];
    		}else{
    			$data = [
    				"status" 	=> "success",
    				"message" 	=> "$email not found, try again!" 
    			];
    		}
    	}

    	// return response
    	return response()->json($data, 200);
    }
}
