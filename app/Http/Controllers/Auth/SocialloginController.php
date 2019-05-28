<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Socialite;
use App\User;

class SocialloginController extends Controller
{
	/**
	* Create a redirect method to facebook api.
	*
	* @return void
	*/
	public function redirect($provider)
	{
		return Socialite::driver($provider)->redirect();
	}
	/**
	* Return a callback method from facebook api.
	*
	* @return callback URL from facebook
	*/
	public function callback($provider)
	{
		$getInfo = Socialite::driver($provider)->user(); 
   		$user = $this->createUser( $getInfo, $provider); 
   		auth()->login($user); 
   		return redirect()->to('/');
	}

	 function createUser($getInfo,$provider){
 		$user = User::where('provider_id', $getInfo->id)->first();
 		dd($user);
 		if (!$user) {
      		$user = User::create([
         		'name'     => $getInfo->name,
         		'email'    => $getInfo->email,
         		'provider' => $provider,
         		'provider_id' => $getInfo->id
     		]);
   		}
   		return $user;
 	}
}
