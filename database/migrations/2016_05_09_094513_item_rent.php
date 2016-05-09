<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemRent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
    {
        Schema::create('item_rent', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rent_id')->unsigned();
            $table->integer('item_id')->unsigned();
             });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('item_rent');
    }
}
