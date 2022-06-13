<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Newsletter ;
use App\Message ;
use App\Student ;
use App\Applicant ;
use App\Job;
use Illuminate\Support\Facades\DB ;

class MessageController extends Controller
{
    public function newsletter(Request $request)
    {
        $data = $request->validate([
            'email' => 'min:10|email|required',
        ]);
        $request->session()->flash('success' , 'Subscribbed Successfully, Please Refresh Page') ;
        Newsletter::create($data) ;
        return back();
    }

    public function message(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|min:10|max:20',
            'email' => 'required|email',
            'subject' => '',
            'message' => 'required|string',
        ]) ;
        $request->session()->flash('success' , 'Message Sent Successfully, Please Refresh Page') ;
        Message::create($data) ;
        return back();
    }

    public function enroll(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email',
            'speciallity' => 'nullable',
            'age' => 'nullable|integer' ,
            'education' => 'nullable' ,
            'course_id' => 'required|exists:courses,id',
        ]) ;
        // Check if student is exist for no duplicate same data in data base
        $duplicate_student = Student::select('id')->where('email' , $data['email'])->first();
        if($duplicate_student == null)
        {
            $student = Student::create([
                'name' => $data['name'] ,
                'email' => $data['email'] ,
                'speciallity' => $data['speciallity'],
                'age' => $data['age'] ,
                'education' => $data['education']
            ]);
            // Student id which returned as new one enrolled
            $student_id = $student->id ;
        }
        else
        {
            // So here we call this student as enrolled one before
            $student_id = $duplicate_student->id ;
            if($data['name'] !== null)
            {
                $duplicate_student->update(['name' => $data['name']]) ;
            }
            if($data['age'] !== null)
            {
                $duplicate_student->update(['age' => $data['age']]) ;
            }
            if($data['speciallity'] !== null)
            {
                $duplicate_student->update(['speciallity' => $data['speciallity']]) ;
            }
            if($data['education'] !== null)
            {
                $duplicate_student->update(['education' => $data['education']]) ;
            }
        }
        DB::table('course_student')->insert([
            'course_id' => $data['course_id'],
            'student_id' => $student_id ,
            'created_at' => now() ,
            'updated_at' => now()
        ]);

        $request->session()->flash('success' , 'You Have Enrolled Course Successfully Wait A Message, Please Refresh Page') ;

        return back();
    }

    public function jobEnroll(Request $request)
    {
        $data = $request->validate([
            'name'  => 'nullable|string|max:50',
            'email' => 'required|email',
            'cv'    => 'required|mimes:docx',
            'job_id'=> 'required|exists:jobs,id',
        ]);

        $job = $data['job_id'];
        $name = $data['name'] ;
        if($request->hasFile('cv'))
        {
            $cv = $request->cv->getClientOriginalName();
            $request->cv->move(public_path('Uploads/cvs/'.$job . '/' .$name), $cv);
        }
        $data['cv'] = $cv ;

        $old_applicant = Applicant::select('id')->where('email' , $data['email'])->first();
        if($old_applicant == null)
        {
            $applicant = Applicant::create([
                'name' => $data['name'] ,
                'email' => $data['email'] ,
                'cv' => $data['cv'] ,
            ]);
            $applicant_id = $applicant->id ;
        }
        else
        {
            $applicant_id = $old_applicant->id ;

            if($data['name'] !== null)
            {
                $old_applicant->update(['name' => $data['name']]) ;
            }
        }
        DB::table('job_applicant')->insert([
            'job_id' => $data['job_id'],
            'applicant_id' => $applicant_id ,
            'created_at' => now() ,
            'updated_at' => now()
        ]);

        $request->session()->flash('success' , 'Apply Job Successfully') ;

        return back();
    }
}
