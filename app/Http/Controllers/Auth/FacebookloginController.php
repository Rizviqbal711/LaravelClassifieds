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
		$user = $service->createOrGetUser(Socialite::driver('facebook')->user());
        auth()->login($user);
        return redirect()->to('/home');
	}
}
