<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('rents', function(Blueprint $table) {

            $table
                    ->foreign('item_id')
                    ->references('id')
                    ->on('items')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table
                    ->foreign('customer_id')
                    ->references('id')
                    ->on('customers')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        $table->dropForeign('rents_customer_id_foreign');
        $table->dropForeign('rents_item_id_foreign');
    }

}
