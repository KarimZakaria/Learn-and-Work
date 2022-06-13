@extends('layouts.app')


@section('content')
   
    <div class="card card-default">
        <div class="clearfix">
            <a href="{{route('Admin.Student.create')}}" class="btn btn-success float-right"
             style="margin-bottom: 10px">Add Student</a>

             <a href="{{route('Admin.Student.index')}}" class="btn btn-success float-left"
             style="margin-bottom: 10px">Back</a>

        </div>
        <h4 class="card-header text-center">All Students </h4>

            <div class="card-body">
                <table  class="table table-striped table-bordered bg-dark text-white" >
                    <thead>
                      <tr>
                        <th class="text-center text-primary" scope="col">#</th>
                        <th class="text-center text-danger" scope="col"> Name </th>
                        <th class="text-center text-danger" scope="col"> Email </th>
                        <th class="text-center text-danger" scope="col">Actions </th> 

                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $student)                              
                            <tr>
                                <th class="text-center" scope="row">{{$loop->iteration}}</th>
                                <th class="text-center" scope="row">
                                    @if($student->course->count() > 0)
                                        {{$student->name}}<br> <a href="{{ route('Admin.Student.showCourses' , $student->id) }}" class="ml-2 badge badge-primary">{{$student->course->count()}} courses</a>
                                    @else
                                        {{$student->name}}<br> <span class="ml-2 badge badge-danger">0 Courses</span>
                                    @endif
                                </th>
                                <th class="text-center" scope="row">{{$student->email}}<br>
                                    @if($student->age !== null )
                                        Age: {{$student->age}} 
                                    @else
                                        Age: <span class='text-danger'>Not Avaliable </span>
                                    @endif
                                </th>
                                
                                <th class="text-center" scope="row">
                                    <a href="{{ route('Admin.Student.edit' , $student->id) }}" class="btn btn-primary btn-sm ">Edit</a>    
                                    <a href="{{ route('Admin.Student.showCourses' , $student->id) }}" class="btn btn-info text-white btn-sm">Show</a>
                                    <a href="{{ route('Admin.Student.destroy' , $student->id) }}" class="btn btn-danger btn-sm">Trash</a>    
                                </th>
                            </tr>
                        @empty
                            No Students Yet !
                        @endforelse
                      
                    </tbody>
                </table>
                <div class="mt-5 d-flex justify-content-center align-items-center w-100">
                    {!! $students->render() !!}
                </div> 
            </div>    
    </div>

    @endsection