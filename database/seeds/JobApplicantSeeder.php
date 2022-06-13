<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobApplicantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_applicant')->insert([
            'job_id' => 1 , 
            'applicant_id' => 1 , 
            'created_at' => now(), 
            'updated_at' => now() , 
        ]);

        DB::table('job_applicant')->insert([
            'job_id' => 2 , 
            'applicant_id' => 2 , 
            'created_at' => now(), 
            'updated_at' => now() , 
        ]);

        DB::table('job_applicant')->insert([
            'job_id' => 3 , 
            'applicant_id' => 3 , 
            'created_at' => now(), 
            'updated_at' => now() , 
        ]);
    }
}
