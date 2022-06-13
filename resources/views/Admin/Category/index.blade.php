@extends('layouts.app')

@section('content')

    
    <div class="card card-default">
        <div class="clearfix">
            <a href="{{route('Admin.Category.create')}}" class="btn btn-success float-right"
             style="margin-bottom: 10px">Add Category</a>

             <a href="{{route('Admin.Category.index')}}" class="btn btn-success float-left"
             style="margin-bottom: 10px">Back</a>

        </div>
        <h4 class="card-header text-center">All Categories</h4>

            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th class="text-center text-primary" scope="col">#</th>
                        <th class="text-center text-danger" scope="col">Cat Name </th>
                        <th class="text-center text-danger" scope="col">Actions </th>

                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)                              
                            <tr>
                                <th class="text-center" scope="row">{{$loop->iteration}}</th>
                                <th class="text-center" scope="row">
                                    @if($category->course->count() > 0)
                                        {{$category->name}} <a href="{{ route('Admin.Category.show' , $category->id) }}" 
                                        class="ml-2 badge badge-primary">{{$category->course->count()}} courses</a>
                                    @else
                                        {{$category->name}} <span class="ml-2 badge badge-danger">{{$category->course->count()}}</span>
                                    @endif
                                </th>
                                <th class="text-center" scope="row">
                                    <a href="{{ route('Admin.Category.edit' , $category->id) }}" class="btn btn-primary btn-sm">Edit</a>    
                                    <a href="{{ route('Admin.Category.destroy' , $category->id) }}" class="btn btn-danger btn-sm">Trash</a>    
                                </th>
                            </tr>
                        @empty
                            No Categories Yet

                        @endforelse
                      
                    </tbody>
                  </table>
            </div>    
    </div>

    @endsection