<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
    	'item_title',
    	'item_description',
    	'item_age',
    	'item_min_price',
    	'item_max_price',
    	'item_city',
    	'item_area',
        'item_category',
        'item_primary_image',
    	'user_id',
    ];

    public function category(){
    	return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class); 
    }
}
