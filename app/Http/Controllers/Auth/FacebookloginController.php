<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Socialite;

class FacebookloginController extends Controller
{
	/**
	* Create a redirect method to facebook api.
	*
	* @return void
	*/
	public function redirectToFacebook()
	{
		return Socialite::driver('facebook')->redirect();
	}
	/**
	* Return a callback method from facebook api.
	*
	* @return callback URL from facebook
	*/
	public function handleFacebookCallback()
	{
		$userSocial = Socialite::driver('facebook')->user();
  		//return $userSocial;
  		$finduser = User::where('facebook_id', $userSocial->id)->first();
  		if($finduser){
    		Auth::login($finduser);
      		return Redirect::to('/');
  		}else{
  			$new_user = User::create([
        		'fname'      => $userSocial->name,
        		'email'      => $userSocial->email,
        		'facebook_id'=> $userSocial->id
    		]);
    		Auth::login($new_user);
    		return redirect()->back();
		}
	}
}
