@extends('layouts.app')


@section('content')

<div class="d-flex justify-content-between">
    <h2 class="mt-2">Edit / Course / {{ $course->name }}</h2>

     <a href="{{route('Admin.Course.index')}}" class="btn btn-success"
     style="margin-bottom: 5px">Back</a>

</div>
<div class="card card-default">

    <div class="card card-default">

    <div class="card-body">
      <form action="{{route('Admin.Course.update')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $course->id }}">
         <div class="form-group">
           <label for="tag"><strong> Course Name: </strong></label>
           <input type="text" name="name" class="@error('name') is-invalid @enderror form-control" value="{{ $course->name }}" >
         </div>
         @error('name')
           <div class="alert alert-danger mt-2">{{$message}}</div>
         @enderror

         <div class="form-group">
           <label for="tag"><strong> Course Price: </strong></label>
           <input type="number" name="price" class="@error('price') is-invalid @enderror form-control" value="{{ $course->price }}">
           @error('price')
             <div class="alert alert-danger mt-2">{{$message}}</div>
           @enderror
         </div>

         <div class="form-group">
          <label for="tag"><strong> Select Category </strong></label>
          <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
            @foreach($categories as $category)
              <option value="{{ $category->id }}" @if($course->category_id == $category->id) selected @endif >{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
        @error('category_id')
            <div class="alert alert-danger mt-2">{{$message}}</div>
        @enderror

         <div class="form-group">
           <label for="tag"><strong>Select Trainer </strong></label>
           <select class="form-control @error('trainer_id') is-invalid @enderror" name="trainer_id">
                @foreach($trainers as $trainer)
                    <option value="{{ $trainer->id }}" @if($course->trainer_id == $trainer->id) selected @endif >{{ $trainer->name }}</option>
                @endforeach
           </select>
         </div>
         @error('trainer_id')
             <div class="alert alert-danger mt-2">{{$message}}</div>
         @enderror

         {{-- <div class="form-group">
           <label for="tag"><strong>Select Location</strong></label>
           <select class="form-control @error('place_id') is-invalid @enderror" name="place_id">
             @foreach($courses as $course)
               @foreach ($course->place as $place)
                 <option value="{{ $place->id }}">{{ $place->location }}</option>
               @endforeach
             @endforeach
           </select>
         </div>
         @error('place_id')
             <div class="alert alert-danger mt-2">{{$message}}</div>
         @enderror --}}

         <div class="form-group">
           <label for="tag"><strong> Course Preview: </strong></label>
           <input type="text" name="preview" class="@error('preview') is-invalid @enderror form-control" value="{{ $course->preview }}">
         </div>
         @error('preview')
             <div class="alert alert-danger mt-2">{{$message}}</div>
         @enderror

         <img class="my-3" src="{{asset('Uploads/courses/' .$course->image)}}" height="200px">

         <div class="form-group">
           <label for="tag"><strong> Course Image: </strong></label>
           <input type="file" name="image" class="@error('image') is-invalid @enderror form-control" >
           @error('image')
             <div class="alert alert-danger mt-2">{{$message}}</div>
           @enderror
         </div>

         <div class="form-group">
           <label for="tag"><strong> Course Description: </strong></label>
           <textarea rows="5" name="description" class="@error('description') is-invalid @enderror form-control" >{{ $course->description }}</textarea>
           @error('description')
             <div class="alert alert-danger mt-2">{{$message}}</div>
           @enderror
         </div>

         <button type="submit" class="btn btn-success mt-2 ">Update </button>
     </form>
    </div>
</div>

@endsection
