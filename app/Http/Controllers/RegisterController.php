
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BoogieUser;
use Carbon\Carbon;

class RegisterController extends Controller
{
    public function create(Request $request)
    {
        $already_email = BoogieUser::where("useremail", $request->user_email)->first();
        $already_mobile = BoogieUser::where("user_mobile", $request->user_mobile)->first();

        if($already_email !== null){
            $data = [
                "status"     => "error",
                "message"    => "Email already exist!" 
            ];
        }elseif($already_mobile !== null){
            $data = [
                "status"     => "error",
                "message"    => "Mobile phone already exist!" 
            ];
        }else{
            $user                       = new BoogieUser();
            $user->username             = $request->user_name;
            $user->useremail            = $request->user_email;
            $user->user_mobile          = $request->user_mobile;
            $user->user_address         = $request->user_address;
            $user->userpassword         = md5(trim($request->user_password));
            $user->location_id          = $request->location_id;
            $user->drone_delivery       = $request->drone_delivery;
            $user->boogie_vip           = $request->boogie_vip;
            $user->payment_option_type  = $request->payment_option_type;
            $user->user_type            = $request->user_type;
            $user->login_type           = $request->login_type;
            $user->fcm_token            = $request->fcm_token;
            $user->device_id            = $request->device_id;
            $user->social_token         = $request->social_token;
            $user->reward_point         = 1;
            $user->total_login          = 1;
            $user->subscription_start_utc = now();
            $user->subscription_end_utc = Carbon::now()->addDays(365);
            $user->deliveries_count     = 0;
            $user->user_image_name      = "avatar";
            $user->user_image_path      = public_path('avatars');
            $user->user_wallet_money    = 0;
            $user->user_lat             = 0.33440;
            $user->user_long            = 0.67756;
            $user->created_on           = now();
            $user->updated_on           = now();
            $user->utc_created_on       = now();
            $user->utc_updated_on       = now();
            $user->deleted_on           = now();
            $user->utc_deleted_on       = now();
            $user->user_status          = 1;
            $user->dispatcher_status    = 1;
            $user->marketer_id          = 1;
            $user->marketer_name        = " ";
            $user->save();

            $data = [
                'status'    => 'success',
                'message'   => 'Registration successful'
            ];
        }

		return response()->json($data);
    }

    public function fetchall(Request $request)
    {
    	$users = BoogieUser::limit(5)->orderBy('id', 'DESC')->get();

    	$data = [
			'status'    => 'success',
			'message'	=> 'fetching successful',
			'users'		=> $users,

		];
		return response()->json($data);
    }
}
