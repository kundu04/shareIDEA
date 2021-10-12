<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'type'=>'Admin',
            'name'=>'Monika Kundu',
            'phone'=>'01987654321',
            'email' =>'admin123@gmail.com',
            'password' => bcrypt('12345678'),
            'status'=>'Active',
        ]);
    }
}
