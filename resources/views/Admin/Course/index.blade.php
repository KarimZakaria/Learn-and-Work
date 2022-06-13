@extends('layouts.app')


@section('content')

@section('styles')

    <style>
        input.empty 
        {
            font-family: FontAwesome;
            font-style: unset ; 
            font-weight: normal;
            font-size: 15px ; 
            text-decoration: inherit;
        }
    </style>
    
@endsection


    
    <div class="card card-default">
        <div class="clearfix">
            <a href="{{route('Admin.Course.create')}}" class="btn btn-success float-right"
             style="margin-bottom: 10px">Add course</a>

             <a href="{{route('Admin.Course.index')}}" class="btn btn-success float-left"
             style="margin-bottom: 10px">Back</a>

             <input onkeyup="showResult(this.value)" id="search" class="empty form-control mt-3 mb-2" 
             name="key" type="text" placeholder="&#xF002; Search Courses">
             <div id="searchCourse"></div>

        </div>
        <h4 class="card-header text-center">All courses</h4>

            <div class="card-body">
                <table  class="table table-striped table-bordered bg-dark text-white" >
                    <thead>
                      <tr>
                        <th class="text-center text-primary" scope="col">#</th>
                        <th class="text-center text-danger" scope="col"> Image </th>
                        <th class="text-center text-danger" scope="col"> Name </th>
                        <th class="text-center text-danger" scope="col"> price</th>
                        <th class="text-center text-danger" scope="col">Actions </th> 
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($courses as $course)                              
                            <tr>
                                <th class="text-center" scope="row">{{$loop->iteration}}</th>
                                <th class="text-center" scope="row">
                                    <img class="rounded" src=" {{asset('Uploads/courses/' .$course->image) }}" height="50px" width="50px">
                                </th>
                                <th class="text-center" scope="row">
                                        {{$course->name}}<br> 
                                </th>
                                <th class="text-center" scope="row">
                                    ${{$course->price}}
                                </th>
                                <th class="text-center" scope="row">
                                    <a href="{{ route('Admin.Course.edit' , $course->id) }}" class="btn btn-primary btn-sm">Edit</a>    
                                    <a href="{{ route('Admin.Course.show' , $course->id) }}" class="btn btn-info text-white btn-sm">More Info</a>    
                                    <a href="{{ route('Admin.Course.destroy' , $course->id) }}" class="btn btn-danger btn-sm">Trash</a>    
                                </th>
                            </tr>
                        @empty
                            No courses Yet !
                        @endforelse
                        
                    </tbody>
                </table>
                <div class="mt-5 d-flex justify-content-center align-items-center w-100">
                    {!! $courses->render() !!}
                </div>                
            </div>    
    </div>

    @endsection
    
    <script>
        function showResult(str) 
        {
            let searchCourse = document.getElementById('search').value ;
            let url = "{{ url('admin-dashboard/courses/search') }}" + "/";
          if (str.length==0) 
          {
            document.getElementById("searchCourse").innerHTML="";
            document.getElementById("searchCourse").style.border="0px";
            return;
          }
          var xmlhttp=new XMLHttpRequest();
          xmlhttp.onreadystatechange=function() 
          {
            if (this.readyState==4 && this.status==200) 
            {
              document.getElementById("searchCourse").innerHTML=this.responseText;
              document.getElementById("searchCourse").style.border="px solid #A5ACB2";
            }
          }
          xmlhttp.open("GET", url+ searchCourse ,true);
          xmlhttp.send();
        }
    </script>