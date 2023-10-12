<?php

use Illuminate\Database\Seeder;

class Admin_usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_users')->insert([
            'name' => 'Administrator',
            'email' =>'admin@gmail.com',
            'password' => bcrypt('admin'),            
            'level' => '1',
        ]);
    }
}
