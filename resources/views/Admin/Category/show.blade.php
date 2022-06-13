@extends('layouts.app')

@section('title' , 'Show Category')

@section('content')

<h2 class="">Show / {{ $category->name }}</h2>

<div class="container mt-5 mb-5">
    <div class="row">
        @forelse($category->course as $course)
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="row text-center">
                        <div class="col-md-12 mb-4">
                            <div class="card bg-light">
                                <div class="card-header">
                                    <h2 class="text-center">{{ $course->name }}</h2>
                                </div>
                                <div class="card-body">
                                    <img class="img-fluid" src="{{ asset('Uploads/courses/'.$course->image) }}" alt="">
                                    <a href="{{ route('Trainer' , $course->trainer->id ) }}">{{$course->trainer->name }}</a>
                                    <p>{{$course->details }}</p>
                                </div>
                            </div>
                        </div>
             
                    </div>
        
                </div>
            </div>
        </div>
        @empty
            No Cat
        @endforelse
    </div>
</div>

       
    
@endsection