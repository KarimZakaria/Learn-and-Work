<?php

use Illuminate\Database\Seeder;
use App\Course; 

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // t => trainer , c => category ,  
        for($c= 1 ; $c<=3 ; $c++)
        {
            for($t = 1 ; $t < 4 ; $t++)
            {
                Course::create([
                    'category_id' => $c , 
                    'trainer_id' => $t, 
                    //'comment_id' => $c, 
                    'place_id' => $t ,  
                    'name' => "course$c category $t", 
                    'preview' => "is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s",
                    'description' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).",
                    'price' => rand(500 , 20000) , 
                    'image' =>"$c$t.jpg", 
                    'booking' => 'avaliable'
                ]);          
            }
        }
            
    }
}