<?php

use Illuminate\Database\Seeder;
use App\Trainer; 

class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trainer::create([
            'name' => 'Karim Mohamed' , 
            'phone' => '01204300602' , 
            'email' => 'karimzakaria345@gmail.com', 
            'image' => '1.jpg',
            'speciallity' => 'Web Development', 
            'preview' => 'any preview ' , 
            'details' => 'web developer programming' , 
        ]) ;
        
        Trainer::create([
            'name' => 'Mahmoud ELsayed' , 
            'phone' => '01212121212' , 
            'email' => 'mahmoud50@gmail.com', 
            'image' => '2.jpg',
            'speciallity' => 'buseniess man', 
            'preview' => 'any preview ' , 
            'details' => 'buseniess administrator' , 
        ]) ;

        Trainer::create([
            'name' => 'Mohamed Ahmed' , 
            'phone' => '01111111111' , 
            'email' => 'moahmed45@gmail.com', 
            'image' => '3.jpg',
            'speciallity' => 'doctor', 
            'preview' => 'any preview ' , 
            'details' => 'childs doctor' , 
        ]) ;

    }
}
