@extends('layouts.app')

   
@section('content')

<div class="d-flex justify-content-between">
    <h2 class="mt-2">Student Creation </h2>

     <a href="{{route('Admin.Student.index')}}" class="btn btn-success"
     style="margin-bottom: 5px">Back</a>

</div>
<div class="card card-default">

    <div class="card card-default"> 

    <div class="card-body">
        <form action="{{route('Admin.Student.store')}}" method="POST">
           @csrf  
            <div class="form-group">
              <label for="tag"><strong> Student Name: </strong></label>
              <input type="text" name="name" class="@error('name') is-invalid @enderror form-control" value="{{ old('name') }}" placeholder="Enter Student Name" >
            </div>
            @error('name')
              <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror              

            <div class="form-group">
              <label for="tag"><strong> Student Age (Nullable) </strong></label>
              <input type="number" name="age" class="@error('age') is-invalid @enderror form-control" value="{{ old('phone') }}" placeholder="Enter Phone" >
            </div>
            @error('age')
              <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror      

            <div class="form-group">
              <label for="tag"><strong> Student Email: </strong></label>
              <input type="email" name="email" class="@error('email') is-invalid @enderror form-control" value="{{ old('email') }}" placeholder="Enter Student Email" >             
            </div>
            @error('email')
                <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror

            <div class="form-group">
              <label for="tag"><strong> Student Spec: </strong></label>
              <textarea rows="5" name="speciallity" class="@error('speciallity') is-invalid @enderror form-control"  placeholder="Enter Student Spec"> {{old('speciallity')}} </textarea>
              @error('speciallity')
                <div class="alert alert-danger mt-2">{{$message}}</div>
              @enderror          
            </div>

            <div class="form-group">
              <label for="tag"><strong> Student Details: </strong></label>
              <textarea rows="5" type="text" name="education" class="@error('education') is-invalid @enderror form-control" placeholder="Enter Student education"> {{old('education')}} </textarea>
              @error('education')
                <div class="alert alert-danger mt-2">{{$message}}</div>
              @enderror              
            </div>

            <button type="submit" class="btn btn-success mt-2 "> Add Student </button>
        </form>
    </div>
</div>
    
@endsection
