<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Jenssegers\Agent\Agent;

use App\Item;
use App\Category;




class PagesController extends Controller
{


    public function home ()
    {

        $agent = new Agent();

        $isMobile = $agent->isMobile();
        $isTablet = $agent->isTablet();

        $items = Item::limit(6)->get();
        $categories = Category::limit(6)->get();

        // $item = $all_items->;


        if($isMobile && !$isTablet) {
            return view('mobile.home', compact('categories', 'items'));
        } else {
            return view('welcome', [

                'items' => $items

            ]);
        }

    }

    public function privacy()
    {
        return view('privacy');        
    }

    public function terms()
    {
        return view('terms');        
    }

}
