<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoryData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         DB::table('categories')->insert([
         ['category_name' => 'Electronics' , 'published' => 1, 'icon' => '  
fas fa-laptop'],
         ['category_name' => 'Motors' , 'published' => 1, 'icon' => '  
fas fa-car' ],
         ['category_name' => 'Jobs', 'published' => 1, 'icon' => '  
fas fa-briefcase' ],
         ['category_name' => 'Gaming' , 'published' => 1, 'icon' => '  
fas fa-gamepad'],
         ['category_name' => 'Sports' , 'published' => 1, 'icon' => '  
far fa-futbol' ],
         ['category_name' => 'Clothing' , 'published' => 1, 'icon' => '  
fas fa-tshirt' ],
         ['category_name' => 'Misc' , 'published' => 1, 'icon' => '  
fas fa-cogs'],
         ['category_name' => 'Household' , 'published' => 1, 'icon' => '  
fas fa-home'],
         ['category_name' => 'Furniture' , 'published' => 1, 'icon' => '  
fas fa-couch'],

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
