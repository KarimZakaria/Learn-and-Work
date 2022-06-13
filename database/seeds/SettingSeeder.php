<?php

use Illuminate\Database\Seeder;
use App\Setting ; 

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'name' => 'Offline' , 
            'logo' => 'logo.jpg' , 
            'city' => 'Sharqiya' , 
            'address' => 'Faculty Of Computers and Informatics , Zagazig University' , 
            'email' => 'fci.zu.org@education.com' , 
            'phone' => '+20121223569' , 
            'work_hours' => '09:00 AM to 17:00 PM' , 
            'facebook' => 'facebook' , 
            'twitter' => 'twiiter' , 
            'insta' => 'insta' , 
            'map' => 'map' , 

        ]); 
    }
}
