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
            <a href="{{route('Admin.Job.create')}}" class="btn btn-success float-right"
             style="margin-bottom: 10px">Add Job</a>

             <a href="{{route('AdminDashboard')}}" class="btn btn-success float-left"
             style="margin-bottom: 10px">Back</a>

             <input onkeyup="showResult(this.value)" id="search" class="empty form-control mt-3 mb-2" 
             name="key" type="text" placeholder="&#xF002; Search Jobs">
             <div id="searchJob"></div>

        </div>
        <h4 class="card-header text-center">All Jobs</h4>

            <div class="card-body">
                <table  class="table table-striped table-bordered bg-dark text-white" >
                    <thead>
                      <tr>
                        <th class="text-center text-primary" scope="col">#</th>
                        <th class="text-center text-danger" scope="col"> Image </th>
                        <th class="text-center text-danger" scope="col"> Job Name </th>
                        <th class="text-center text-danger" scope="col"> price</th>
                        <th class="text-center text-danger" scope="col">Actions </th> 
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($jobs as $job)                              
                            <tr>
                                <th class="text-center" scope="row">{{$loop->iteration}}</th>
                                <th class="text-center" scope="row">
                                    <img class="rounded" src=" {{asset('Uploads/Jobs/' .$job->image) }}" height="50px" width="50px">
                                </th>
                                <th class="text-center" scope="row">
                                        {{$job->job_name}}<br> 
                                </th>
                                <th class="text-center" scope="row">
                                    ${{$job->salary}}
                                </th>
                                <th class="text-center" scope="row">
                                    <a href="{{ route('Admin.Job.edit' , $job->id) }}" class="btn btn-primary btn-sm">Edit</a>    
                                    <a href="{{ route('Admin.Job.show' , $job->id) }}" class="btn btn-info text-white btn-sm">More Info</a>    
                                    <a href="{{ route('Admin.Job.destroy' , $job->id) }}" class="btn btn-danger btn-sm">Trash</a>    
                                </th>
                            </tr>
                        @empty
                            No Jobs Yet !
                        @endforelse
                        
                    </tbody>
                </table>
                <div class="mt-5 d-flex justify-content-center align-items-center w-100">
                    {!! $jobs->render() !!}
                </div>                
            </div>    
    </div>

    @endsection
    
    <script>
        function showResult(str) 
        {
            let searchJob = document.getElementById('search').value ;
            let url = "{{ url('admin-dashboard/jobs/search') }}" + "/";
          if (str.length==0) 
          {
            document.getElementById("searchJob").innerHTML="";
            document.getElementById("searchJob").style.border="0px";
            return;
          }
          var xmlhttp=new XMLHttpRequest();
          xmlhttp.onreadystatechange=function() 
          {
            if (this.readyState==4 && this.status==200) 
            {
              document.getElementById("searchJob").innerHTML=this.responseText;
              document.getElementById("searchJob").style.border="px solid #A5ACB2";
            }
          }
          xmlhttp.open("GET", url+ searchJob ,true);
          xmlhttp.send();
        }
    </script>