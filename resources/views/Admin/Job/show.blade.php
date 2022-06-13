@extends('layouts.app')

@section('title' , 'Show Job')

@section('content')

    <div class="card card-default">
        <div class="clearfix">
            <a href="{{route('Admin.Job.index')}}" class="btn btn-success float-left"
            style="margin-bottom: 10px">All Jobs</a>
        </div>

        <h4 class="card-header text-center">Show / {{$job->job_name}}</h4>

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
                                <td> Job Name</td>
                                <td>
                                    <h4>{{ $job->job_name }}</h4>
                                </td>   
                            </tr>

                            <tr class="text-center">
                                <td> Company</td>
                                <td>
                                    <h4>{{ $job->company_name }}</h4>
                                </td>
                            </tr>

                            <tr class="text-center">
                                <td  class=""> Image</td>
                                <td>
                                    <img class="img-fluid" width="200px" height="200px" src="{{asset('Uploads/jobs/' .$job->image)}}">
                                </td>
                            </tr>

                            <tr class="text-center">
                                <td> Location</td>
                                <td>
                                    {{ $job->location }}
                                </td>
                            </tr>

                            <tr class="text-center">
                                <td> Preview</td>
                                <td>
                                    {{ $job->preview }}
                                </td>
                            </tr>

                            <tr class="text-center">
                                <td> Requirments</td>
                                <td>
                                    {{ $job->requirments }}
                                </td>
                            </tr>

                            <tr class="text-center">
                                <td> Experience</td>
                                <td>
                                    {{ $job->experience }}
                                </td>
                            </tr>

                            <tr class="text-center">
                                <td> Type</td>
                                <td class="text-success">
                                   <strong> {{ $job->work_hours }} </strong>
                                </td>
                            </tr>

                            <tr class="text-center">
                                <td> Salary</td>
                                <td  class="text-success">
                                    <strong> $ {{ $job->salary }}  </strong>
                                </td>
                            </tr>

                            <tr class="text-center">
                                <td> Details</td>
                                <td>
                                    {{ $job->who_are }}
                                </td>
                            </tr>
                        
                    </tbody>
                </table>
                              
            </div>    
    </div>

       
    
@endsection