<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->unsignedinteger('item_age');
            $table->string('item_city');
            $table->string('item_area');
            $table->unsignedinteger('item_min_price');
            $table->unsignedinteger('item_max_price');
            $table->text('item_image')->nullable();
            $table->renameColumn('title' ,'item_title');
            $table->renameColumn('description' ,'item_description');
            $table->unsignedinteger('user_id');


        });
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
