@extends('layouts.app')

@section('title' , 'Show Category')

@section('content')

    <div class="card card-default">
        <div class="clearfix">
            <a href="{{route('Admin.Course.index')}}" class="btn btn-success float-left"
            style="margin-bottom: 10px">All Courses</a>
        </div>

        <h4 class="card-header text-center">Show / {{$course->name}}</h4>

            <div class="card-body">
                <table  class="table table-striped table-bordered bg-dark text-white" >
                    <thead>
                      <tr>
                        <th class="text-center text-danger" scope="col">Properity</th>
                        <th class="text-center text-danger" scope="col"> Description </th> 
                      </tr>
                    </thead>
                    <tbody>
                            <tr class="text-center">
                                <td> Course Name</td>
                                <td>
                                    <h4>{{ $course->name }}</h4>
                                </td>   
                            </tr>

                            <tr class="text-center">
                                <td> Category</td>
                                <td>
                                    <h4>{{ $course->category->name }}</h4>
                                </td>
                            </tr>

                            <tr class="text-center">
                                <td> Instructor</td>
                                <td>
                                    <h4>{{ $course->trainer->name }}</h4>
                                </td>
                            </tr>

                            <tr class="text-center">
                                <td  class=""> Image</td>
                                <td>
                                    <img class="img-fluid" width="200px" height="200px" src="{{asset('Uploads/courses/' .$course->image)}}">
                                </td>
                            </tr>

                            <tr class="text-center">
                                <td> Preview</td>
                                <td>
                                    {{ $course->preview }}
                                </td>
                            </tr>

                            <tr class="text-center">
                                <td> Course Fee </td>
                                <td  class="text-success">
                                    <strong> $ {{ $course->price }}  </strong>
                                </td>
                            </tr>

                            <tr class="text-center">
                                <td> Details</td>
                                <td>
                                    {{ $course->description }}
                                </td>
                            </tr>

                            <tr>
                                <td> Student Enrolled <span class="ml-2 badge badge-primary">{{$course->student->count()}} </span></td>
                                <td>
                                    @forelse ($course->student as $student)
                                        <li>
                                            <a href="{{ route('Admin.Student.show' , $student->id) }}">{{ $student->name}}</a>
                                        </li>
                                    @empty
                                        No Enrolled Students Yet
                                    @endforelse
                                </td>
                            </tr>
                        
                    </tbody>
                </table>
                              
            </div>    
    </div>

   
@endsection