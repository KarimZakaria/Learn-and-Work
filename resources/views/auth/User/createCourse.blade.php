@extends('layouts.userapp')

   
@section('content')

<div class="d-flex justify-content-between">
    <h2 class="mt-2">Course Creation </h2>

     <a href="{{route('home')}}" class="btn btn-success"
     style="margin-bottom: 5px">Back</a>

</div>
<div class="card card-default">

    <div class="card card-default"> 

    <div class="card-body">
        <form action="{{route('User.storeCourse')}}" method="POST" enctype="multipart/form-data">
           @csrf  
            <div class="form-group">
              <label for="tag"><strong> Course Name: </strong></label>
              <input type="text" name="name" class="@error('name') is-invalid @enderror form-control" value="{{ old('name') }}" placeholder="Enter Course Name" >
            </div>
            @error('name')
              <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror 
            
            <div class="form-group">
              <label for="tag"><strong> Course Price: </strong></label>
              <input type="number" name="price" class="@error('price') is-invalid @enderror form-control" value="{{ old('price') }}" placeholder="Enter Course Price" >            
              @error('price')
                <div class="alert alert-danger mt-2">{{$message}}</div>
              @enderror              
            </div>

            <div class="form-group">
              <label for="tag"><strong>Select Trainer </strong></label>
              <select class="form-control @error('trainer_id') is-invalid @enderror" name="trainer_id">
                @foreach($trainers as $trainer)
                  <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                @endforeach
              </select>
            </div>
            @error('trainer_id')
                <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror

            <div class="form-group">
              <label for="tag"><strong> Select Category </strong></label>
              <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                @foreach($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach              
              </select>
            </div>
            @error('category_id')
                <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror
            
            <div class="form-group">
              <label for="tag"><strong> Course Preview: </strong></label>
              <input type="text" name="preview" class="@error('preview') is-invalid @enderror form-control" value="{{ old('preview') }}" placeholder="Enter Course Preview" >             
            </div>
            @error('preview')
                <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror

            
            <div class="form-group">
              <label for="tag"><strong> Course Image: </strong></label>
              <input type="file" name="image" class="@error('image') is-invalid @enderror form-control" >
              @error('image')
                <div class="alert alert-danger mt-2">{{$message}}</div>
              @enderror              
            </div>

            <div class="form-group">
              <label for="tag"><strong> Course Description: </strong></label>
              <textarea rows="5" name="description" class="@error('description') is-invalid @enderror form-control"  placeholder="Enter Course Description"> {{old('description')}} </textarea>
              @error('description')
                <div class="alert alert-danger mt-2">{{$message}}</div>
              @enderror          
            </div>

            <button type="submit" class="btn btn-success mt-2 "> Add Course </button>
        </form>
    </div>
</div>
    
@endsection
