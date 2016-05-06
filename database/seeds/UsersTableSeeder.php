<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Admin',
                'email' => "admin@gmail.com",
                'password' => Hash::make('admin')
            ],
            [
                'id' => 2,
                'name' => 'Admin',
                'email' => "1@1.com",
                'password' => Hash::make('1')
            ]
        ]);
    }

}
