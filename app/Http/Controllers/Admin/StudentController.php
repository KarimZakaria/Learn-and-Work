<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB ; 
use App\Student ; 

class StudentController extends Controller
{
    public function index()
    {
        $data['students'] = Student::select('id' , 'name', 'age' , 'email' , 'speciallity' , 'education')
        ->orderBy('id' , 'DESC')->paginate(15);    
        return view('Admin.Student.index')->with($data) ; 
    }

    public function create()
    {
        return view('Admin.Student.create'); 
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:25',
            'email' => 'required|string|max:36|unique:students',
            'age' => 'nullable|integer',
            'education' => 'nullable|string',
            'speciallity' => 'nullable|string|max:1000',
        ]);
        Student::create($data); 
        session()->flash('success' , 'Student Created Successfully') ; 
        return redirect(route('Admin.Student.index')) ; 
    }

    public function show($id)
    {
        Student::select('id' , 'name' )->orderBy('id' , 'DESC')->get(); 
        $data['student'] = Student::FindOrFail($id) ; 
        return view('Admin.Student.show')->with($data) ; 
    }

    public function edit($id)
    {
        $data['student'] = Student::findOrFail($id) ; 
        return view('Admin.Student.edit')->with($data);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:25',
            'email' => 'required|string|max:36|unique:students',
            'age' => 'nullable|integer',
            'education' => 'nullable|string',
            'speciallity' => 'nullable|string|max:1000',
        ]);
        
        Student::findOrFail($request->id)->update($data); 
        session()->flash('success' , 'Student Updated Successfully') ; 
        return redirect(route('Admin.Student.index')) ; 
    }

    public function destroy($id)
    {
        Student::findOrFail($id)->delete();
        session()->flash('success' , 'Student Deleted Successfully'); 
        return back(); 
    }

    public function showCourses($id)
    {
        $data['courses'] = Student::findOrFail($id)->course ; 
        $data['student_id'] = $id ; 
        return view('Admin.Student.showCourses')->with($data) ;
    }

    public function approve($id , $cId)
    {
        DB::table('course_student')->where('student_id' , $id)->where('course_id' , $cId)
        ->update(['status' => 'Approve' ]) ; 
        session()->flash('success' , 'Student Has Been Approved Successfully, He Now Enrolled Course');
        return back() ; 
    }

    public function reject($id , $cId)
    {
        DB::table('course_student')->where('student_id' , $id)->where('course_id' , $cId)
        ->update([ 'status' => 'Reject' ]) ; 
        session()->flash('success' , 'Student Has Been Rejected To Join That Course');
        return back() ; 

    }
}
