@extends('layouts.app')

@section('title' , 'Show Place')

@section('content')

<h2 class="">Show / {{ $place->location }}</h2>

<div class="container mt-5 mb-5">
    <div class="row">
        @forelse($place->course as $course) {{--Many To Many Relation --}}
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