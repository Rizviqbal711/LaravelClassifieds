<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
    	'item_title',
    	'item_description',
        'item_age',
    	'item_condition',
    	'item_min_price',
    	'item_max_price',
        'category_id',
        'item_primary_image',
    	'user_id',
        'user_location_id',
    ];

    public function category(){
    	return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class); 
    }

    public function location() {
        return $this->belongsTo(Location::class, 'user_location_id', 'id'); 
    }
}
