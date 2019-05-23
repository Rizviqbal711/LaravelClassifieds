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
         ['category_name' => 'Electronics' , 'published' => 1 ],
         ['category_name' => 'Household' , 'published' => 1],
         ['category_name' => 'Sports' , 'published' => 1 ],
         ['category_name' => 'Gaming' , 'published' => 1],
         ['category_name' => 'Furniture' , 'published' => 1],
         ['category_name' => 'Clothing' , 'published' => 1 ],
         ['category_name' => 'Misc' , 'published' => 1],
         ['category_name' => 'Toys' , 'published' => 1 ],
         ['category_name' => 'Musical Instruments', 'published' => 1  ],
         ['category_name' => 'Jewellery & Watches', 'published' => 1 ],

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
