<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Reward;
use App\Location;

class UserController extends Controller
{


    public function __construct(){
        
        $this->middleware('auth');
    
    }

   	public function myprofile(User $user)
   	{
      $user_id = Auth()->user()->id;

   		$this_user = User::where('id',$user_id)->first();

      $locations = Location::where('user_id',$user_id)->get();
      // dd($locations);

   		return view('user.profile', compact('this_user','locations'));

   	}

   	public function update(User $user)
   	{

		$attr = request()->all(); 
		// dd($attr);
        unset($attr['_method']);
        unset($attr['_token']);

        User::where('id', $user->id)->update($attr);

        return redirect('/profile');
   	}

    public function rewards(Reward $reward)
    {

        $user_id = Auth()->user()->id;
        
        $rewards = Reward::where('user_id',$user_id)->sum('reward_points');
        // dd($rewards);
        return view('user.rewards', compact('rewards'));
    }

    public function location(Request $request)
    {
        $lcn_attr = request()->validate([
          'user_location_name' => 'required',
          'user_location_city' => 'required',
          'user_location_area'=>'required',
        ]);
  

        $user_id = Auth()->user()->id;
        $lcn_attr['user_id'] = $user_id;

        Location::create($lcn_attr);

        return redirect('/profile');

       
    }

    public function location_delete(Location $location)
    {
      $location->delete();
      
      return redirect('/profile');

    }
}
