<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Job ;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage ;

class JobController extends Controller
{
    public function index()
    {
        $data['jobs'] = Job::select('id' , 'job_name' , 'company_name' , 'preview' , 'requirments' , 'image' , 'salary' ,
        'experience' , 'work_hours' , 'location' , 'who_are')->orderBy('id' , 'DESC')
        ->paginate(10) ;

        return view('Admin.Job.index')->with($data);
    }

    public function create()
    {
        $data['jobs'] = Job::select('id' , 'job_name')->get();

        return view('Admin.Job.create')->with($data);
    }

    public function store(Request $request)
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
        // Hashing Image Details And Get Only Its Name
        $new_image_name = $data['image']->hashName();
        // Use Intervention Package To Resize Image And Save It With Its New Name
        Image::make($data['image'])->resize(3796 , 2780)->save(public_path('Uploads/jobs/' .$new_image_name));
        // Save The New Name Of Image In The DATABASE And In Your PC
        $data['image'] = $new_image_name ;
        Job::create($data);
        session()->flash('success' , 'Job Created Successfully') ;
        return redirect(route('Admin.Job.index')) ;
    }

    public function show($id)
    {
        Job::select('id' , 'job_name' )->orderBy('id' , 'DESC')->get();
        $data['job'] = Job::FindOrFail($id);
        return view('Admin.Job.show')->with($data) ;
    }

    public function edit($id)
    {
        $data['job'] = Job::findOrFail($id) ;
        return view('Admin.Job.edit')->with($data);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'job_name' => 'required|string|max:50',
            'company_name' => 'required|string|max:50',
            'image' => 'nullable|mimes:jgp,png,jpeg',
            'preview' => 'required|string|max:1000',
            'requirments' => 'required|string|max:2500' ,
            'salary' => 'required|string',
            'experience' => 'nullable' ,
            'work_hours' => 'required|string' ,
            'location' => 'required|min:10' ,
            'who_are' => 'nullable|max:20000'
        ]);

        $old_name = Job::findOrFail($request->id)->image ;
        if($request->hasFile('image'))
        {
            Storage::disk('uploads')->delete('jobs/' .$old_name) ;
            $new_image_name = $data['image']->hashName();
            Image::make($data['image'])->resize(3796 , 2780)->save(public_path('Uploads/jobs/' .$new_image_name));
            $data['image'] = $new_image_name ;
        }
        else
        {
            $data['image'] = $old_name ;
        }
        Job::findOrFail($request->id)->update($data);
        session()->flash('success' , 'Job Updated Successfully') ;
        return redirect(route('Admin.Job.index')) ;
    }

    public function destroy($id)
    {
        $job = job::withTrashed()->findOrFail($id) ;

        if($job->trashed())
        {
            Storage::disk('uploads')->delete('jobs/' .$job->image);

            $job->forceDelete();
            session()->flash('success' , 'Job Deleted Successfully');
            return back();
        }
        else
        {
            $job->delete();
            session()->flash('success' , 'Job Trashed Successfully');
            return back();
        }
    }

    public function trashed()
    {
        $data['trashed'] = Job::onlyTrashed()->orderBy('id' , 'DESC')->paginate(9);
        return view('Admin.Job.Trashed')->with($data);
    }

    public function restore($id)
    {
        Job::onlyTrashed()->findOrFail($id)->restore();
        session()->flash('success' , 'Job Restored Successfully') ;
        return redirect(route('Admin.Job.index')) ;
    }

    public function search($id)
    {
        $data['jobs'] = Job::where('job_name' , 'like' , '%' . $id .'%')->get();

        return view('Admin.Job.search')->with($data) ;
    }
}
