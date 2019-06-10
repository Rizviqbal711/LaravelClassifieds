<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\Category;
use App\User;

class MobileController extends Controller
{
    public function index(Request $request) {
    	$categories = Category::limit(6)->get();
        
        $search_categories = $request->category_id;
    	
		if ($search_categories) {
            $items = Item::where('category_id' , $search_categories)->get();
        } else {
            $items = Item::all();
        }



    	return view('mobile.home', compact('categories', 'items'));

    }
}
