<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Place ; 
class PlaceController extends Controller
{
    public function index()
    {
        $data['places'] = Place::select('id' , 'location')->orderBy('id' , 'DESC')->get(); 

        return view('Admin.Place.index')->with($data); 
    }

    public function create()
    {
        return view('Admin.Place.create'); 
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'location' => 'required|string|min:15' , 
        ]); 

        Place::create($data);

        session()->flash('success' , 'Palce Created Successfully') ; 

        return redirect(route('Admin.Place.index'));
    }

    public function show($id)
    {
        $data['place'] = Place::findOrFail($id) ; 

        return view('Admin.Place.show')->with($data) ; 
    }

    public function edit($id)
    {
        $data['place'] = Place::findOrFail($id) ; 

        return view('Admin.Place.edit')->with($data);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|min:15'
        ]); 
        
        Place::findOrFail($request->id)->update($data); 

        session()->flash('success' , 'Place Updated Successfully') ; 
        
        return redirect(route('Admin.Place.index')) ; 
    }

    public function destroy($id)
    {
        Place::findOrFail($id)->delete();

        session()->flash('success' , 'Place Deleted Successfully'); 
       
        return back(); 
    }
}
