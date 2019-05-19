<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;


class PagesController extends Controller
{


    public function home ()
    {
        $items = Item::limit(6)->get();
        // $item = $all_items->;

        return view('welcome', [

            'items' => $items

        ]);
    }

    public function about()
    {
        return view('about');        
    }

    public function contact()
    {
        return view('contact');        
    }

}
