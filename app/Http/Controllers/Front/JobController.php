<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Job ;

class JobController extends Controller
{
    public function index()
    {
        $data['jobs'] = Job::select('id' , 'job_name' , 'company_name' , 'preview' , 'requirments' , 'image' , 'salary' ,
        'experience' , 'work_hours' , 'location' , 'who_are')->orderBy('id' , 'DESC')
        ->paginate(15) ;

        return view('Front.Jobs.index')->with($data);
    }

    public function show($id)
    {
        $data['job'] = Job::findOrFail($id) ;

        return view('Front.Jobs.show')->with($data) ;
    }
}
