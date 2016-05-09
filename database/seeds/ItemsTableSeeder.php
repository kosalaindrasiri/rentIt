<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run() {
        DB::table('items')->insert([[
            'id' => 1,
            'name' => 'item 01',
            'availability' => "1",
            'rent_price' => '500.00',
            'code' => '1',
            'purchased_price' => '20000.00'
        ],
        [
            'id' => 2,
            'name' => 'item 02',
            'availability' => "1",
            'rent_price' => '400.00',
            'code' => '2',
            'purchased_price' => '30000.00'
        ]
        ]);
    }
}
