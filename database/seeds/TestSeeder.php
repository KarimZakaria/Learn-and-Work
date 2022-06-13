<?php

use Illuminate\Database\Seeder;
use App\Testimonial ; 

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Testimonial::create([
            'oponion' => 'About This Course We Learned More Preofessient Intelligance and now we enable to work anywhere 
                          its a very fantastic course and hope to repeat it again in another course' , 
            'image' => '1.jpg' , 
            'name' => 'Leonardo Prascalli' , 
            'status' => 'Graduated Student', 
            'course' => 'Back End Development'
        ]);

        Testimonial::create([
            'oponion' => 'About This Course We Learned More Preofessient Intelligance and now we enable to work anywhere 
                          its a very fantastic course and hope to repeat it again in another course' , 
            'image' => '2.jpg' , 
            'name' => 'Marcus Rashford' , 
            'status' => 'Active Student', 
            'course' => 'Ios Development'
        ]);

        Testimonial::create([
            'oponion' => 'About This Course We Learned More Preofessient Intelligance and now we enable to work anywhere 
                          its a very fantastic course and hope to repeat it again in another course' , 
            'image' => '3.jpg' , 
            'name' => 'David Silva' , 
            'status' => 'Waiting Student', 
            'course' => 'Android Development'
        ]);
    }
}
