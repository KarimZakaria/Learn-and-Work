<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursePlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1 ; $i <= 10 ; $i++)
        {
            DB::table('course_place')->insert([
                'course_id' => rand(1 , 9) , 
                'place_id' => rand(1 , 6) , 
                'created_at' => now() ,
                'updated_at' => now()
            ]);
        }
    }
}
