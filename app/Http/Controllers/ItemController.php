<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\Category;
use App\User;

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

        return view('items.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated_attr = request()->validate([
            'item_title' => ['required', 'min:3'],
            'item_description' => ['required', 'min:3'],
            'item_age' => ['required'],
            'item_min_price' => ['required'],
            'item_max_price' => ['required'],
            'item_city' => ['required'],
            'item_area' => ['required', 'min:3'],
            // 'item_area' => ['required', 'min:3'],
            // 'item_category' => ['required', 'min:3'],
            'item_image' => ['required'],
            'item_image.*' => ['mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $image_names = [];
        if (request()->hasFile('item_image')) {
            foreach (request()->file('item_image') as $image) {
                $file_name = date('YmdHis') . '-' . $image->getClientOriginalName();
                $image->move(public_path() . '/uploads/', $file_name);  
                $image_names[] = $file_name;
            }
        }
        $validated_attr['item_image'] = json_encode($image_names);
        $validated_attr['user_id'] = Auth()->user()->id;

        // TEMPORARY: remove later after fixing the age..
        $validated_attr['item_age'] = 0;
        
        Item::create($validated_attr);

        return redirect('/items');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {

        return view('items.show', compact('item'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {

        return view('items.edit', compact('item'));

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
        // dd($item);
        Item::where('id', $item->id)->update(request([
            'item_title', 
            'item_description',
            'item_city',
            'item_age',
            'item_min_price',
            'item_max_price',
            'item_category'
            ])
        );



        return redirect('/items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        
        $item->delete();
    
        return redirect('/items');
    
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
        return view('myitems', compact('user_items'));   
    }
}
