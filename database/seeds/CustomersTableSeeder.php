<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        DB::table('customers')->insert([[
            'id' => 1,
            'customer_name' => 'Cus 01',
            'nic' => "124578124",
            'phone' => '0777878789',
            'address' => 'sample address 01'
        ],
        [
            'id' => 2,
            'customer_name' => 'Cus 02',
            'nic' => "124578124",
            'phone' => '0777878456',
            'address' => 'sample address 02'
        ]

        ]);
    }

}
