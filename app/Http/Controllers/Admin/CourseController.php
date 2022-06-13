<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Course ;
use App\Trainer ;
use App\Category ;
use App\Place ;
use Intervention\Image\Facades\Image ;
use Illuminate\Support\Facades\Storage ;

class CourseController extends Controller
{
    public function index()
    {
        $data['courses'] = Course::select('id' , 'name', 'image' , 'price' , 'preview' , 'description' )
        ->orderBy('id' , 'DESC')->paginate(8);
        return view('Admin.Course.index')->with($data) ;
    }

    public function create()
    {
        $data['trainers'] = Trainer::select('id' , 'name')->get() ;
        $data['categories'] = Category::select('id' , 'name')->get() ;
        $data['places'] = Place::select('id' , 'location')->get() ;
        $data['courses'] = Course::select('id' , 'name')->with('place')->get();
        return view('Admin.Course.create')->with($data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:25',
            'price' => 'required|integer',
            'image' => 'required|mimes:jgp,png,jpeg',
            'preview' => 'required|string|max:1000',
            'trainer_id' => 'required|exists:trainers,id' ,
            'category_id' => 'required|exists:categories,id' ,
            //'place_id' => 'required|exists:places,id',
            'description' => 'required|string|max:1000',
        ]);
        // Hashing Image Details And Get Only Its Name
        $new_image_name = $data['image']->hashName();
        // Use Intervention Package To Resize Image And Save It With Its New Name
        Image::make($data['image'])->resize(690 , 520)->save(public_path('Uploads/courses/' .$new_image_name));
        // Save The New Name Of Image In The DATABASE And In Your PC
        $data['image'] = $new_image_name ;
        Course::create($data);
        session()->flash('success' , 'Course Created Successfully') ;
        return redirect(route('Admin.Course.index')) ;
    }

    public function show($id)
    {
        Course::select('id' , 'name' )->orderBy('id' , 'DESC')->get();
        $data['course'] = Course::FindOrFail($id);
        return view('Admin.Course.show')->with($data) ;
    }

    public function edit($id)
    {
        $data['trainers'] = Trainer::select('id' , 'name')->get() ;
        $data['categories'] = Category::select('id' , 'name')->get() ;
        $data['places'] = Place::select('id' , 'location')->get() ;
        $data['course'] = Course::findOrFail($id) ;
        return view('Admin.Course.edit')->with($data);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:25',
            'price' => 'required|integer',
            'image' => 'nullable|mimes:jgp,png,jpeg',
            'preview' => 'required|string|max:1000',
            'trainer_id' => 'required|exists:trainers,id' ,
            'category_id' => 'required|exists:categories,id' ,
            //'place_id' => 'required|exists:places,id' ,
            'description' => 'required|string|max:1000',
        ]);
        $old_name = Course::findOrFail($request->id)->image ;
        if($request->hasFile('image'))
        {
            Storage::disk('uploads')->delete('courses/' .$old_name) ;
            $new_image_name = $data['image']->hashName();
            Image::make($data['image'])->resize(690 , 520)->save(public_path('Uploads/courses/' .$new_image_name));
            $data['image'] = $new_image_name ;
        }
        else
        {
            $data['image'] = $old_name ;
        }
        Course::findOrFail($request->id)->update($data);
        session()->flash('success' , 'course Updated Successfully') ;
        return redirect(route('Admin.Course.index')) ;
    }

    public function destroy($id)
    {
        $course = Course::withTrashed()->findOrFail($id) ;

        if($course->trashed())
        {
            // Delete The Image From PC (نهائيا) if the post is deleted before
            Storage::disk('uploads')->delete('courses/' .$course->image);
            $course->forceDelete();
            session()->flash('success' , 'Course Deleted Successfully');
            return back();
        }
        else
        {
            $course->delete() ;
            session()->flash('success' , 'Course Trashed Successfully');
            return back();
        }

    }

    public function trashed()
    {
        $data['trashed'] = Course::onlyTrashed()->orderBy('id' , 'DESC')->paginate(9);
        return view('Admin.Course.Trashed')->with($data);
    }

    public function restore($id)
    {
        Course::onlyTrashed()->findOrFail($id)->restore();
        session()->flash('success' , 'Course Restored Successfully') ;
        return redirect(route('Admin.Course.index')) ;
    }

    public function search($id)
    {
        $data['courses'] = Course::where('name' , 'like' , '%' . $id .'%')->get();

        return view('Admin.Course.search')->with($data) ;
    }
}
