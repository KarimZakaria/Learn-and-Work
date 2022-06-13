<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Trainer ;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage ;

class TrainerController extends Controller
{
    public function index()
    {
        $data['trainers'] = Trainer::select('id' , 'name', 'phone' , 'email' , 'image' , 'speciallity', 'preview' , 'details')
        ->orderBy('id' , 'DESC')->get();

        return view('Admin.Trainer.index')->with($data) ;
    }

    public function create()
    {
        return view('Admin.Trainer.create');
    }

    public function store(Request $request)
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

        // Hashing Image Details And Get Only Its Name
        $new_image_name = $data['image']->hashName();

        // Use Intervention Package To Resize Image And Save It With Its New Name
        Image::make($data['image'])->resize(690 , 520)->save(public_path('Uploads/trainers/' .$new_image_name));

        // Save The New Name Of Image In The DATABASE And In Your PC
        $data['image'] = $new_image_name ;

        Trainer::create($data);

        session()->flash('success' , 'Trainer Created Successfully') ;

        return redirect(route('Admin.Trainer.index')) ;
    }

    public function show($id)
    {
        Trainer::select('id' , 'name' )->orderBy('id' , 'DESC')->get();

        $data['trainer'] = Trainer::FindOrFail($id) ;

        return view('Admin.Trainer.show')->with($data) ;
    }

    public function edit($id)
    {
        $data['trainer'] = Trainer::findOrFail($id) ;

        return view('Admin.Trainer.edit')->with($data);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:25',
            'phone' => 'nullable|string|max:13|min:9',
            'email' => 'nullable|string|max:25',
            'image' => 'nullable|mimes:jgp,png,jpeg',
            'speciallity' => 'required|string|max:1000',
            'preview' => 'required|string|max:1000',
            'details' => 'required|string|max:1000',
        ]);

        $old_name = Trainer::findOrFail($request->id)->image ;

        if($request->hasFile('image'))
        {
            Storage::disk('uploads')->delete('trainers/' .$old_name) ;

            $new_image_name = $data['image']->hashName();

            Image::make($data['image'])->resize(690 , 520)->save(public_path('Uploads/trainers/' .$new_image_name));

            $data['image'] = $new_image_name ;
        }
        else
        {
            $data['image'] = $old_name ;
        }

        Trainer::findOrFail($request->id)->update($data);

        session()->flash('success' , 'Trainer Updated Successfully') ;

        return redirect(route('Admin.Trainer.index')) ;
    }

    public function destroy($id)
    {
        $trainer = Trainer::findOrFail($id);
        if($trainer->trashed())
        {
            $current_image = Trainer::findOrFail($id)->image ;

            Storage::disk('uploads')->delete('trainers/' .$current_image);

            Trainer::findOrFail($id)->forceDelete();

            session()->flash('success' , 'Trainer Deleted Successfully');

            return back();
        }
        else
        {
            $trainer->delete();
            session()->flash('success' , 'Trainer Trashed Successfully');
            return back();
        }
    }

    public function trashed()
    {
        $data['trashed'] = Trainer::onlyTrashed()->orderBy('id' , 'DESC')->paginate(9);

        return view('Admin.Trainer.Trashed')->with($data);
    }

    public function restore($id)
    {
        Trainer::onlyTrashed()->findOrFail($id)->restore();
        session()->flash('success' , 'Trainer Restored Successfully') ;
        return redirect(route('Admin.Trainer.index')) ;
    }
}
