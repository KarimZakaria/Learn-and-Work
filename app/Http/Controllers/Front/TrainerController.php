<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Trainer ; 

class TrainerController extends Controller
{
    public function index()
    {
        $data['trainers'] = Trainer::select('name' , 'id' , 'image' , 'speciallity')->
        orderBy('id' , 'desc')->paginate(3); 
        return view('Front.Trainers.index')->with($data); 
    }

    public function show($id)
    {
        $data['trainer'] = Trainer::findOrFail($id); 

        return view('Front.Trainers.show')->with($data); 
    }
}
