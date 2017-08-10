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
        DB::table('thanhvien')->insert([
        [
            'name' => "admin",
            'email' => "admin@gmail.com",
            'password' => bcrypt('admin@123'),
            'level'=>0,
        ],
        [
        	'name' => "user",
            'email' => "makeuser@gmail.com",
            'password' => bcrypt('12345678'),
            'level'=>1,
        ]]);
    }
}
