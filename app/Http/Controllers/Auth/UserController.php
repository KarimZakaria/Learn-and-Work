<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category ; 
use App\User ; 
use App\Trainer ; 
use App\Course ;
use App\Job ;  
use Image ; 
use Illuminate\Support\Facades\Storage ;

class UserController extends Controller
{
    public function index()
    {
        $data['users'] = User::select('id' , 'name' , 'email')->get();
        $data['cats'] = Category::all()->count(); 
        return view('home')->with($data) ; 
    }


    public function createCategory()
    {
        return view('auth.User.create') ; 
    }

    public function storeCategory(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string' ,
        ]) ;
        
        Category::create($data); 

        session()->flash('success' , 'Category Created Successfully') ; 
        return back() ;

    }

    public function createCourse()
    {
        $data['trainers'] = Trainer::select('id' , 'name')->get() ; 
        $data['categories'] = Category::select('id' , 'name')->get() ;
        return view('auth.User.createCourse')->with($data) ; 
    }

    public function storeCourse(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:25',
            'price' => 'required|integer',
            'image' => 'required|mimes:jgp,png,jpeg',
            'preview' => 'required|string|max:1000',
            'trainer_id' => 'required|exists:trainers,id' ,
            'category_id' => 'required|exists:categories,id' , 
            'description' => 'required|string|max:1000',
        ]); 
        $new_image_name = $data['image']->hashName(); 
        Image::make($data['image'])->resize(690 , 520)->save(public_path('Uploads/courses/' .$new_image_name)); 
        $data['image'] = $new_image_name ; 
        Course::create($data); 
        session()->flash('success' , 'Course Created Successfully') ; 
        return back() ; 
    }

    public function createTrainer()
    {
        return view('auth.User.createTrainer'); 
    }

    public function storeTrainer(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:25',
            'phone' => 'nullable|string|max:13|min:9',
            'email' => 'nullable|string|max:25',
            'image' => 'required|mimes:jgp,png,jpeg',
            'speciallity' => 'required|string|max:1000',
            'preview' => 'required|string|max:1000',
            'details' => 'required|string|max:1000',
        ]); 
        
        $new_image_name = $data['image']->hashName(); 

        Image::make($data['image'])->resize(690 , 520)->save(public_path('Uploads/trainers/' .$new_image_name)); 

        $data['image'] = $new_image_name ; 

        Trainer::create($data); 
        
        session()->flash('success' , 'Trainer Created Successfully') ; 

        return back() ; 
    }

    public function createJob()
    {
        $data['jobs'] = Job::select('id' , 'job_name')->get();

        return view('auth.User.createJob')->with($data) ; 
    }

    public function storeJob(Request $request)
    {
        $data = $request->validate([
            'job_name' => 'required|string|max:50',
            'company_name' => 'required|string|max:50',
            'image' => 'required|mimes:jgp,png,jpeg',
            'preview' => 'required|string|max:1000',
            'requirments' => 'required|string|max:2500' ,
            'salary' => 'required|integer',
            'experience' => 'nullable' , 
            'work_hours' => 'required|string' , 
            'location' => 'required|min:10' , 
            'who_are' => 'nullable|max:20000'
        ]); 
        $new_image_name = $data['image']->hashName(); 
        Image::make($data['image'])->resize(3796 , 2780)->save(public_path('Uploads/jobs/' .$new_image_name)); 
        $data['image'] = $new_image_name ; 
        Job::create($data); 
        session()->flash('success' , 'Job Created Successfully') ; 
        return redirect(route('home')); 
    }

}
