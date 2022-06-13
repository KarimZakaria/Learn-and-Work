<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category; 
use App\Course; 

class CategoryController extends Controller
{
    public function category($id)
    {
        $data['categories'] =  Category::findOrFail($id) ; 

        $data['courses'] = Course::where('category_id' , $id)->orderBy('id' , 'DESC')->paginate(6);

        return view('Front.Courses.category')->with($data);
    }

    public function show($id , $courseId)
    {
        $data['course'] = Course::findOrFail($courseId);
        
        return view('Front.Courses.show')->with($data);
    }
}
