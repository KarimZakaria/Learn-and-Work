<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Admin ;
use App\Category ;
use App\User ;
use App\Student ;
use App\Trainer ;
use App\Course ;
use App\Place ;
use App\Job ;

class AdminController extends Controller
{
    public function index()
    {
        $data['admins'] = Admin::select('id' , 'username' , 'email')->get();
        $data['category_count'] = Category::all()->count();
        $data['user_count'] = User::all()->count();
        $data['student_count'] = Student::all()->count();
        $data['trainer_count'] = Trainer::all()->count();
        $data['course_count'] = Course::all()->count();
        $data['place_count'] = Place::all()->count();
        $data['job_count'] = Job::all()->count();

        return view('Admin.index')->with($data);
    }
}
