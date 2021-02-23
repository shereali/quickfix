<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class ScheduleCreateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['title' => '1 Week'],
            ['title' => '2 Weeks'],
            ['title' => '3 Weeks'],
            ['title' => '4 Weeks'],
            ['title' => '5 Weeks'],
           
         ];
 
        DB::table('schedule_creates')->insert($data);
    }
}
