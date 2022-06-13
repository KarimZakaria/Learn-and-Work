<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Course;
use App\Student ; 
use App\Trainer;
use App\Testimonial ; 
use App\Job ; 

class HomePageController extends Controller
{
    public function index()
    {
        $data['courses'] = Course::select('id' , 'name' , 'preview' ,'image' , 'description' , 
        'price' , 'comment_id' , 'trainer_id' , 'category_id')
        ->orderBy('id' , 'DESC')->paginate(6);

        $data['jobs'] = Job::select('id' , 'job_name' , 'company_name' , 'preview' , 'requirments' ,
        'image' , 'salary' , 
        'experience' , 'work_hours' , 'location' , 'who_are')
        ->orderBy('id' , 'DESC')->paginate(6) ;

        // Counter 
        $data['coursesNumber'] = Course::count(); 
        $data['studentsNumber'] = Student::count(); 
        $data['trainersNumber'] = Trainer::count(); 
        $data['jobCount'] = Job::count(); 

        $data['tests'] = Testimonial::select('id' , 'name' , 'image' , 'oponion' , 'status' , 'course')->get();

        return view('Front.Homepage')->with($data); 
    }
}
