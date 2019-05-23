<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\Category;

class ListController extends Controller
{


	public function __construct(){
        
        $this->middleware('auth');
    
    }


	public function create()
    {
    	$phone = Auth()->user()->phone;
    	$categories = Category::all();
        return view('items.create', compact('categories', 'phone'));

    }
}
