@extends('layouts.app')

   
@section('content')

<div class="d-flex justify-content-between">
    <h2 class="mt-2">Edit / Trainer / {{ $trainer->name }}</h2>

     <a href="{{route('Admin.Trainer.index')}}" class="btn btn-success"
     style="margin-bottom: 5px">Back</a>

</div>
<div class="card card-default">

    <div class="card card-default"> 

    <div class="card-body">
        <form action="{{route('Admin.Trainer.update')}}" method="POST" enctype="multipart/form-data">
           @csrf  

            <input type="hidden" name="id" value="{{ $trainer->id }}"> 

            <div class="form-group">
              <label for="tag"><strong> Trainer Name: </strong></label>
              <input type="text" name="name" class="@error('name') is-invalid @enderror form-control" value="{{ $trainer->name }}" placeholder="Enter Trainer Name" >
            </div>
            @error('name')
              <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror              

            <div class="form-group">
              <label for="tag"><strong> Trainer Phone (Nullable) </strong></label>
              <input type="text" name="phone" class="@error('phone') is-invalid @enderror form-control" value="{{ $trainer->phone }}" placeholder="Enter Phone" >
            </div>
            @error('phone')
              <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror      

            <div class="form-group">
              <label for="tag"><strong> Trainer Email: </strong></label>
              <input type="email" name="email" class="@error('email') is-invalid @enderror form-control" value="{{ $trainer->email }}" placeholder="Enter Trainer Email" >             
            </div>
            @error('email')
                <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror

            <img class="my-3" src="{{asset('Uploads/trainers/' .$trainer->image)}}" height="200px">

            <div class="form-group">
              <label for="tag"><strong> Trainer Image: </strong></label>
              <input type="file" name="image" class="@error('image') is-invalid @enderror form-control" >
              @error('image')
                <div class="alert alert-danger mt-2">{{$message}}</div>
              @enderror              
            </div>

            <div class="form-group">
              <label for="tag"><strong> Trainer Spec: </strong></label>
              <textarea rows="5" name="speciallity" class="@error('speciallity') is-invalid @enderror form-control"  placeholder="Enter Trainer Spec">{{ $trainer->speciallity }}</textarea>
              @error('speciallity')
                <div class="alert alert-danger mt-2">{{$message}}</div>
              @enderror          
            </div>

            <div class="form-group">
              <label for="tag"><strong> Trainer Details: </strong></label>
              <textarea rows="5" type="text" name="details" class="@error('details') is-invalid @enderror form-control" placeholder="Enter Trainer Details">{{ $trainer->details }}</textarea>
              @error('details')
                <div class="alert alert-danger mt-2">{{$message}}</div>
              @enderror              
            </div>

            <div class="form-group">
              <label for="tag"><strong> Trainer Preview: </strong></label>
              <textarea rows="5" type="text" name="preview" class="@error('preview') is-invalid @enderror form-control" placeholder="Enter Trainer Preview">{{ $trainer->preview }}</textarea>
              @error('preview')
                <div class="alert alert-danger mt-2">{{$message}}</div>
              @enderror              
            </div>

            <button type="submit" class="btn btn-success mt-2 "> Update</button>
        </form>
    </div>
</div>
    
@endsection
