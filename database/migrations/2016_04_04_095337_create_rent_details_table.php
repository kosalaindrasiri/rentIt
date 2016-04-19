<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rent_details', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('customer_name');
            $table->string('nic');
            $table->float('phone');
            $table->integer('item_id')->unsigned();
            $table->datetime('rent_date_and_time');
            $table->datetime('required_days');
            $table->float('paid');
                               
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rent_details');
    }
}
