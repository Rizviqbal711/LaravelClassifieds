<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\Category;
use App\User;
use App\Reward;
use App\Location;
use Jenssegers\Agent\Agent;

class ItemController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::all();

        $search_categories = $request->category_id;

    
        if ($search_categories) {
            $items = Item::where('category_id' , $search_categories)->get();
        } else {
            $items = Item::all();
        }

        // dd($location_id);

        // dd($search_categories);
        return view('items.index', [

            'items' => $items,
            'categories' => $categories,
            

        ]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        // NOT USED
        // USED IN ListController
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request);

        $agent = new Agent();

        $validated_attr = request()->validate([
            'item_title' => ['required', 'min:3'],
            'item_description' => ['required', 'min:3'],
            'item_age' => ['required'],
            'item_condition' => ['required'],
            'item_min_price' => ['numeric', 'required'],
            'item_max_price' => ['numeric', 'required', 'min:'.request()->item_min_price],
            'category_id' => ['required'],
            'item_primary_image' => ['required'],
            'item_primary_image.*' => ['mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $user_details = request()->validate([
            'phone' => ['required'],
            'contact_whatsapp' => ['required'],
        ]);


        if (request()->user_location_name == null || request()->user_location_city == null || request()->user_location_area == null) {
            $item_location = request()->validate([
                'user_location_id' =>['required']
            ]);

        }

        if (request()->user_location_id == null) {
            $location = request()->validate([
                'user_location_name' => ['required', 'min:3'],
                'user_location_city' => ['required', 'min:3'],
                'user_location_area' => ['required', 'min:3'],
            ]);
        }

        // dd((!empty($location)) ? true : false);

        $user_id = Auth()->user()->id;
        if (request()->hasFile('item_primary_image')) {
            $file_name = date('YmdHis') . '-' . request()->file('item_primary_image')->getClientOriginalName();
            request()->file('item_primary_image')->move(public_path() . '/uploads/', $file_name);  
        }
        $validated_attr['item_primary_image'] = $file_name;
        $validated_attr['user_id'] = $user_id;

        // TEMPORARY: remove later after fixing the age..

        $item = Item::create($validated_attr);

        Reward::create([
            'user_id' => Auth()->user()->id,
            'reward_points' => 5,
        ]);

        if(!empty($location)){
            $new_location = Location::create([
                'user_id' => Auth()->user()->id,
                'user_location_name' => $location['user_location_name'],
                'user_location_city'=> $location['user_location_city'],
                'user_location_area'=> $location['user_location_area'],
            ]);

            Item::where('id', $item->id)->update(['user_location_id' => $new_location->id]);

        } else {

            Item::where('id', $item->id)->update($item_location);
        }


        User::where('id', $user_id)->update($user_details);

        if ($agent->isMobile()) {
            return redirect('/');
        } else {
            return redirect('/items');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {

        $route = url()->current();
        return view('items.show', compact('item', 'route'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {

        $user_id = Auth()->user()->id;
        
        $this->authorize('update', $item);

        $categories = Category::all();

        $locations = Location::where('user_id', $user_id)->get();
        
        return view('items.edit', compact('item', 'categories', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Item $item)
    {


        $agent = new Agent();

        $attr = request()->validate([
            'item_title' => ['required', 'min:3'],
            'item_description' => ['required', 'min:3'],
            'item_age' => ['required'],
            'item_condition' => ['required'],
            'item_min_price' => ['numeric', 'required'],
            'item_max_price' => ['numeric', 'required', 'min:'.request()->item_min_price],
            'category_id' => ['required'],
            'user_location_id' => ['required'],
            'item_primary_image' => ['required'],
            'item_primary_image.*' => ['mimes:jpeg,png,jpg,gif', 'max:7168'],
        ]);
        unset($attr['_method']);
        unset($attr['_token']);

        // dd($attr);

        if (request()->hasFile('item_primary_image')) {
            $file_name = date('YmdHis') . '-' . request()->file('item_primary_image')->getClientOriginalName();
            request()->file('item_primary_image')->move(public_path() . '/uploads/', $file_name);  
            $attr['item_primary_image'] = $file_name;
        }

        Item::where('id', $item->id)->update($attr);



        if ($agent->isMobile()) {
            return redirect('/');
        } else {
            return redirect('/items');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        
        $agent = new Agent();
        
        $item->delete();

        if ($agent->isMobile()) {
            return redirect('/');
        } else {
            return redirect('/items');
        }
    
    }


    public function search(Request $request) {

        $search = $request->get('search');
        $search_qry = Item::where('item_title' , 'LIKE', '%'.$search. '%')->get();
        // dd($qry);
        return view('search', compact('search_qry'));
    }


    public function useritems(Item $item){

        $user_id = Auth()->user()->id;

        $user_items = $item->where('user_id', $user_id)->get();

        // dd($user_items);

        return view('myitems', compact('user_items'));   
    }
}
