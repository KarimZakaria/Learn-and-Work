@extends('layouts.app')


@section('content')
   
    <div class="card card-default">

        <h4 class="card-header text-center">Student Courses</h4>

            <div class="card-body">
                <table  class="table table-striped table-bordered bg-dark text-white" >
                    <thead>
                      <tr>
                        <th class="text-center text-primary" scope="col">#</th>
                        <th class="text-center text-danger" scope="col"> Name </th>
                        <th class="text-center text-danger" scope="col"> Status </th>
                        <th class="text-center text-danger" scope="col">Actions </th> 
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($courses as $course)                              
                            <tr>
                                <th class="text-center" scope="row">
                                    {{$loop->iteration}}
                                </th>

                                <th class="text-center" scope="row">
                                    {{$course->name}}
                                </th>

                                <th class="text-center" scope="row">
                                    {{$course->pivot->status}}
                                </th>

                                <th class="text-center" scope="row">

                                    @if($course->pivot->status !== 'approve')
                                        <a href="{{ route('Admin.Student.approve' , [$student_id ,$course->id ]) }}" class="btn btn-primary btn-sm ">Approve</a>    
                                    @endif

                                    @if($course->pivot->status !== 'reject')
                                        <a href="{{ route('Admin.Student.reject' , [$student_id , $course->id ]) }}" class="btn btn-danger btn-sm">Reject</a>
                                    @endif
                                </th>
                            </tr>
                        @empty
                            Student Haven't Enrolled Courses Yet !
                        @endforelse
                      
                    </tbody>
                </table>
                {{-- <div class="mt-5 d-flex justify-content-center align-items-center w-100">
                    {!! $students->render() !!}
                </div>  --}}
            </div>    
    </div>

    @endsection