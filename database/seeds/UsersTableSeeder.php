<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Hoang Viet',
            'email' =>'viet@gmail.com',
            'password' => bcrypt('admin'),
            'phone' => '01649573828',
            'address' => 'BMT - Daklak',
            'status' => '1',
            'type' => '1',
            'level' => '100',
        ]);
    }
}
