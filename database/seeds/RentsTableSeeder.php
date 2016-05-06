<?php

use Illuminate\Database\Seeder;

class RentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('rents')->insert([[
            'id' => 1,
            'item_id' => '1',
            'customer_id' => "1",
            'rent_date' => '2016.05.01',
            'expected_return_date' => '2016.05.07',
            'paid_amount' => '100',
            'rent_return' => '1'
        ],
        [
            'id' => 2,
            'item_id' => '2',
            'customer_id' => "1",
            'rent_date' => '2016.05.01',
            'expected_return_date' => '2016.05.07',
            'paid_amount' => '100',
            'rent_return' => '1'
        ]
        ]);
    }
}
