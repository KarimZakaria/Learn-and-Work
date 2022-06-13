@extends('layouts.app')


@section('content')

    
    <div class="card card-default">
        <div class="clearfix">
            <a href="{{route('Admin.Trainer.create')}}" class="btn btn-success float-right"
             style="margin-bottom: 10px">Add Trainer</a>

             <a href="{{route('Admin.Trainer.index')}}" class="btn btn-success float-left"
             style="margin-bottom: 10px">Back</a>

        </div>
        <h4 class="card-header text-center">All Trainers</h4>

            <div class="card-body">
                <table  class="table table-striped table-bordered bg-dark text-white" >
                    <thead>
                      <tr>
                        <th class="text-center text-primary" scope="col">#</th>
                        <th class="text-center text-danger" scope="col"> Image </th>
                        <th class="text-center text-danger" scope="col"> Name </th>
                        <th class="text-center text-danger" scope="col"> Phone</th>
                        <th class="text-center text-danger" scope="col">Actions </th> 

                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($trainers as $trainer)                              
                            <tr>
                                <th class="text-center" scope="row">{{$loop->iteration}}</th>
                                <th class="text-center" scope="row">
                                    <img class="rounded" src=" {{asset('Uploads/Trainers/' .$trainer->image) }}" height="50px" width="50px">
                                </th>
                                <th class="text-center" scope="row">
                                    @if($trainer->course->count() > 0)
                                        {{$trainer->name}}<br> <a href="{{ route('Admin.Trainer.show' , $trainer->id) }}" class="ml-2 badge badge-primary">{{$trainer->course->count()}} courses</a>
                                    @else
                                        {{$trainer->name}}<br> <span class="ml-2 badge badge-danger">0 Courses</span>
                                    @endif
                                </th>
                                <th class="text-center" scope="row">
                                    @if($trainer->phone !== null )
                                        {{$trainer->phone}} <br> 
                                    @else 
                                        Not Avaliable <br>
                                    @endif

                                </th>
                                
                                <th class="text-center" scope="row">
                                    <a href="{{ route('Admin.Trainer.edit' , $trainer->id) }}" class="btn btn-primary btn-sm">Edit</a>    
                                    <a href="{{ route('Admin.Trainer.show' , $trainer->id) }}" class="btn btn-info text-white btn-sm">More Info</a>    
                                    <a href="{{ route('Admin.Trainer.destroy' , $trainer->id) }}" class="btn btn-danger btn-sm">Trash</a>    
                                </th>
                            </tr>
                        @empty
                            No Trainers Yet !

                        @endforelse
                      
                    </tbody>
                  </table>
            </div>    
    </div>

    @endsection
    