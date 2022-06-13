<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1 ; $i< 10 ; $i++)
        {
            DB::table('course_user')->insert([
                'course_id' => rand(1 , 9), 
                'user_id' => rand(1 , 2), 
                'created_at' => now() ,
                'updated_at' => now() , 
            ]);
        }
    }
}
