<?php

use Illuminate\Database\Seeder;
use App\Service ; 

class ServiceSeeder extends Seeder
{
    
    public function run()
    {
        Service::create([
            'title' => 'Offline Courses' , 
            'text' => 'Offline Courses That You can search and access it anywhere then enroll by data and wait a confirming from the Owners'
        ]);

        Service::create([
            'title' => 'Applying Jobs', 
            'text' => 'Access anywhere All jobs you want can be accessed online from a variety of different devices at home, work or on the go.'
        ]);

        Service::create([
            'title' => 'Offline Courses' , 
            'text' => 'Access anywhere All your notes can be accessed online from a variety of different devices at home, work or on the go.'
        ]);

        Service::create([
            'title' => 'Offline Courses' , 
            'text' => 'Offline Courses That You can access it anywhere then enroll and wait a confirming from the Owners'
        ]);

        Service::create([
            'title' => 'Offline Courses' , 
            'text' => 'Offline Courses That You can access it anywhere then enroll and wait a confirming from the Owners'
        ]);

        Service::create([
            'title' => 'Offline Courses' , 
            'text' => 'Offline Courses That You can access it anywhere then enroll and wait a confirming from the Owners'
        ]);
        
    }
}
