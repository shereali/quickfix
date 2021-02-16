<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['sl_no' => 0,'name' => 'Saturday', 'short_name' =>'Sat', 'status' => 1],
            ['sl_no' => 1, 'name' => 'Sunday', 'short_name' =>'Sun', 'status' => 1],
            ['sl_no' => 2, 'name' => 'Monday', 'short_name' =>'Mon', 'status' => 1],
            ['sl_no' => 3, 'name' => 'Tuesday', 'short_name' =>'Tue', 'status' => 1],
            ['sl_no' => 4, 'name' => 'Wednesday', 'short_name' =>'Wed', 'status' => 1],
            ['sl_no' => 5, 'name' => 'Thursday', 'short_name' =>'Thu', 'status' => 1],
            ['sl_no' => 6, 'name' => 'Friday', 'short_name' =>'Fri', 'status' => 1]
         ];
 
        DB::table('days')->insert($data);
    }
}
