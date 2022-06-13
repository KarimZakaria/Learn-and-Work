<?php

use Illuminate\Database\Seeder;
use App\Job ; 

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Job::create([
            'job_name' => 'Francias Teacher' , 
            'company_name' => 'Elsallam Scholl' , 
            'preview' => 'We are hiring A teacher who has skills in france language to work with us',
            'requirments' => 'Enable To Be A Leader , Can Manage A Classes Of The Community Of This Subject Can 
            Be Able To Make The Students Better In The Language , Has An Experience To Solve Any Problem , 
            Can Be A Memberof our School ',
            'image' => '1.jpg' , 
            'salary' => '$2000 Per Month' , 
            'experience' => 'Must Be Expert More Than 5 Years ' , 
            'work_hours' => 'Remotley', 
            'Location' => 'Egypt , Cairo , Elsallam Street Infront Of Bank Misr' , 
            'who_are' => 'We Are A school where built in 1985 , we are a special organization , and we look forward
            to the best quality of our workers and teachers , We Are A school where built in 1985 , we are a special organization , and we look forward
            to the best quality of our workers and teachers We Are A school where built in 1985 , we are a special organization , and we look forward
            to the best quality of our workers and teachers ' ,
        ]);

        Job::create([
            'job_name' => 'Saftey Engineer ' , 
            'company_name' => 'The West Desert' , 
            'preview' => 'We are hiring An Enginner who has skills in france language to work with us',
            'requirments' => 'Enable To Be A Leader , Can Manage A Classes Of The Community Of This Subject Can 
            Be Able To Make The Students Better In The Language , Has An Experience To Solve Any Problem , 
            Can Be A Memberof our School ',
            'image' => '2.jpg' , 
            'salary' => '$2000 Per Month' , 
            'experience' => 'Must Be Expert More Than 5 Years ' , 
            'work_hours' => 'Part Time', 
            'Location' => 'Egypt , Cairo , Elsallam Street Infront Of Bank Misr' , 
            'who_are' => 'We Are A school where built in 1985 , we are a special organization , and we look forward
            to the best quality of our workers and teachers , We Are A school where built in 1985 , we are a special organization , and we look forward
            to the best quality of our workers and teachers We Are A school where built in 1985 , we are a special organization , and we look forward
            to the best quality of our workers and teachers ' ,

        ]);

        Job::create([
            'job_name' => 'Dentsit ' , 
            'company_name' => 'Elsallam Scholl' , 
            'preview' => 'We are hiring A Doctor Specialist in dentist who has skills in france language to work with us',
            'requirments' => 'Enable To Be A Leader , Can Manage A Classes Of The Community Of This Subject Can 
            Be Able To Make The Students Better In The Language , Has An Experience To Solve Any Problem , 
            Can Be A Memberof our School ',
            'image' => '3.jpg' , 
            'salary' => '$2000 Per Month' , 
            'experience' => 'Must Be Expert More Than 5 Years ' , 
            'work_hours' => 'Full Time', 
            'Location' => 'Egypt , Cairo , Elsallam Street Infront Of Bank Misr' , 
            'who_are' => 'We Are A school where built in 1985 , we are a special organization , and we look forward
            to the best quality of our workers and teachers , We Are A school where built in 1985 , we are a special organization , and we look forward
            to the best quality of our workers and teachers We Are A school where built in 1985 , we are a special organization , and we look forward
            to the best quality of our workers and teachers ' ,
        ]);
    }
}
