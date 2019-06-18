<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public $table = 'user_locations';

    public $fillable = ['user_location_name', 'user_location_area', 'user_location_city', 'user_id'];

 	public function user() {
        return $this->belongsTo(User::class); 
    }

  
}
