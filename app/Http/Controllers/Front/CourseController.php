<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Course;

class CourseController extends Controller
{
    public function index()
    {

        $data['courses'] = Course::select('id' , 'name' , 'preview' ,'image' , 'description' , 'price' ,
        'comment_id' , 'trainer_id' , 'category_id')
        ->orderBy('id' , 'DESC')->paginate(9);

        return view('Front.Courses.index')->with($data);
    }

    public function search($id)
    {
        $data['courses'] = Course::where('name' , 'like' , '%' . $id .'%')->get();

        return view('Front.Courses.search')->with($data) ;
    }
}
