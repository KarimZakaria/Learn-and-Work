<?php

use Illuminate\Database\Seeder;
use App\Applicant; 

class ApplicantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Applicant::create([
            'name' => 'Applicant 1 ', 
            'email' => 'applicant1@app.com' , 
            'cv' => '1.docx' ,
        ]);

        Applicant::create([
            'name' => 'Applicant 2', 
            'email' => 'applicant2@app.com' , 
            'cv' => '2.docx' ,
        ]);

        Applicant::create([
            'name' => 'Applicant 3', 
            'email' => 'applicant3@app.com' , 
            'cv' => '3.docx' ,
        ]);
    }
}
