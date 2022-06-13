@extends('layouts.app')

@section('content')

    
    <div class="card card-default">
        <div class="clearfix">
            <a href="{{route('Admin.Place.create')}}" class="btn btn-success float-right"
             style="margin-bottom: 10px">Add Place</a>

             <a href="{{route('Admin.Place.index')}}" class="btn btn-success float-left"
             style="margin-bottom: 10px">Back</a>

        </div>
        <h4 class="card-header text-center">All Places</h4>

            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th class="text-center text-primary" scope="col">#</th>
                        <th class="text-center text-danger" scope="col">Place Name </th>
                        <th class="text-center text-danger" scope="col">Actions </th>

                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($places as $place)                              
                            <tr>
                                <th class="text-center" scope="row">{{$loop->iteration}}</th>
                                <th class="text-center" scope="row">  
                                    @if($place->course->count() > 0)                                  
                                        {{$place->location}} <a href="{{ route('Admin.Place.show' , $place->id) }}" class="ml-2 badge badge-primary">{{$place->course->count()}} courses</a>
                                    @else
                                        {{$place->location}} <span class="ml-2 badge badge-danger"> 0 courses</span>
                                    @endif
                                </th>
                                <th class="text-center" scope="row">
                                    <a href="{{ route('Admin.Place.edit' , $place->id) }}" class="btn btn-primary btn-sm">Edit</a>    
                                    <a href="{{ route('Admin.Place.destroy' , $place->id) }}" class="btn btn-danger btn-sm">Trash</a>    
                                </th>
                            </tr>
                        @empty
                            No Places Yet
                        @endforelse
                      
                    </tbody>
                  </table>
            </div>    
    </div>

    @endsection