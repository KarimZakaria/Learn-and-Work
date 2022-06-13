@extends('layouts.app')

   
@section('content')

<div class="d-flex justify-content-between">
    <h2 class="mt-2">Place Creation </h2>

     <a href="{{route('Admin.Place.index')}}" class="btn btn-success"
     style="margin-bottom: 5px">Back</a>

</div>
<div class="card card-default">

    <div class="card card-default"> 

    <div class="card-body">
        <form action="{{route('Admin.Place.store')}}" method="POST">
           @csrf  
            <div class="form-group">
              <label for="tag"><strong> Place Name: </strong></label>
              <input type="text" name="location" class="@error('location') is-invalid @enderror form-control" value="{{ old('location') }}" placeholder="Enter Place Name" >
              @error('location')
                <div class="alert alert-danger mt-2">{{$message}}</div>
              @enderror              
              <button type="submit" class="btn btn-success mt-2 "> Add Place </button>
            </div>
        </form>
    </div>
</div>
    
@endsection
