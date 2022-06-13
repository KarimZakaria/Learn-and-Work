@extends('layouts.app')

@section('content')

<h2 class="">Edit / Place / {{$place->name}} </h2>

<div class="card card-default">

    <div class="card card-default">

        <div class="clearfix">

             <a href="{{route('Admin.Place.index')}}" class="btn btn-success float-right"
             style="margin-bottom: 10px">Back</a>

        </div>

    <div class="card-body">
    
        <form action="{{route('Admin.Place.update')}}" method="POST">
           @csrf  
            <input type="hidden" name="id" value=" {{ $place->id }}">

            <div class="form-group">
              <label for="tag">Place Name: </label>
              <input type="text" name="location" class="@error is-invalid @enderror form-control" placeholder="Enter Place Name" value="{{$place->name}}">
              @error('location')
                <div class="alert alert-danger mt-2">{{$message}}</div>
              @enderror 
              <button type="submit" class="btn btn-success mt-2 "> Update </button>
            </div>
        </form>
    </div>
</div>
    
@endsection