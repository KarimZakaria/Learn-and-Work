@extends('layouts.app')


@section('content')
   
    <div class="card card-default">
        <div class="clearfix">
             <a href="{{route('Admin.Course.index')}}" class="btn btn-success float-left"
             style="margin-bottom: 10px">Back</a>
        </div>
        <h4 class="card-header text-center">All Trashed Courses </h4>

            <div class="card-body">
                <table  class="table table-striped table-bordered bg-dark text-white" >
                    @forelse ($trashed as $trash)  
                        <thead>
                        <tr>
                            <th class="text-center text-primary" scope="col">#</th>
                            <th class="text-center text-danger" scope="col"> Course Name </th>
                            <th class="text-center text-danger" scope="col">Actions </th> 
                        </tr>
                        </thead>
                        <tbody>
                                                    
                                <tr>
                                    <th class="text-center" scope="row">{{$loop->iteration}}</th>
                                    <th class="text-center" scope="row">{{$trash->name}}</th>
                                    <th class="text-center" scope="row">
                                        <a href="{{ route('Admin.Course.Restore' , $trash->id) }}" class="btn btn-primary btn-sm">Restore</a>
                                        <a href="{{ route('Admin.Course.destroy' , $trash->id) }}" class="btn btn-danger btn-sm">Delete</a>    
                                    </th>
                                </tr>
                            @empty
                                <h3 class="text-center text-danger"> No Trashed Courses Yet !</h3>
                            @endforelse
                        
                        </tbody>
                </table>
                <div class="mt-5 d-flex justify-content-center align-items-center w-100">
                    {!! $trashed->render() !!}
                </div> 
            </div>    
    </div>

@endsection