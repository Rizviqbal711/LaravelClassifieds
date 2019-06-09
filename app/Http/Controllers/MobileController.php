<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\Category;
use App\User;

class MobileController extends Controller
{
    public function index() {
    	$categories = Category::limit(6)->get();
    	$items = Item::all();

    	return view('mobile.home', compact('categories', 'items'));

    }
}
