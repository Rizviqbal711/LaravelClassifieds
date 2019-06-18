<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\Category;
use App\Location;

class ListController extends Controller
{


	public function __construct(){
        
        $this->middleware('auth');
    
    }


	public function create()
    {
    	$user_id = Auth()->user()->id;

    	$phone = Auth()->user()->phone;

    	$locations = Location::where('user_id', $user_id)->get();

    	$categories = Category::all();

        return view('items.create', compact('categories', 'phone', 'locations'));

    }
}
