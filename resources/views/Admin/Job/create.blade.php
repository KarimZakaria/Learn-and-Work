@extends('layouts.app')

   
@section('content')

<div class="d-flex justify-content-between">
    <h2 class="mt-2">Job Creation </h2>

     <a href="{{route('Admin.Job.index')}}" class="btn btn-success"
     style="margin-bottom: 5px">Back</a>

</div>
<div class="card card-default">

    <div class="card card-default"> 

    <div class="card-body">
        <form action="{{route('Admin.Job.store')}}" method="POST" enctype="multipart/form-data">
           @csrf  
            <div class="form-group">
              <label for="tag"><strong> Job Name: </strong></label>
              <input type="text" name="job_name" class="@error('job_name') is-invalid @enderror form-control" value="{{ old('job_name') }}" placeholder="Enter Job Name" >
            </div>
            @error('job_name')
              <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror 
            
            <div class="form-group">
              <label for="tag"><strong> Company Name : </strong></label>
              <input type="text" name="company_name" class="@error('company_name') is-invalid @enderror form-control" value="{{ old('company_name') }}" placeholder="Enter Compnay Name " >            
              @error('company_name')
                <div class="alert alert-danger mt-2">{{$message}}</div>
              @enderror              
            </div>

            <div class="form-group">
              <label for="tag"><strong> Company Location : </strong></label>
              <input type="text" name="location" class="@error('location') is-invalid @enderror form-control" value="{{ old('location') }}" placeholder="Enter Compnay Location " >            
              @error('location')
                <div class="alert alert-danger mt-2">{{$message}}</div>
              @enderror              
            </div>

            <div class="form-group">
              <label for="tag"><strong> Job Preview: </strong></label>
              <input type="text" name="preview" class="@error('preview') is-invalid @enderror form-control" value="{{ old('preview') }}" placeholder="Enter Job Preview" >             
            </div>
            @error('preview')
                <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror

            
            <div class="form-group">
              <label for="tag"><strong> Job Image: </strong></label>
              <input type="file" name="image" class="@error('image') is-invalid @enderror form-control" >
              @error('image')
                <div class="alert alert-danger mt-2">{{$message}}</div>
              @enderror              
            </div>

            <div class="form-group">
              <label for="tag"><strong> Job Requirments: </strong></label>
              <textarea rows="5" name="requirments" class="@error('requirments') is-invalid @enderror form-control"  placeholder="Enter Job Description">{{old('requirments')}}</textarea>
              @error('requirments')
                <div class="alert alert-danger mt-2">{{$message}}</div>
              @enderror          
            </div>

            <div class="form-group">
              <label for="tag"><strong> Job Salary: </strong></label>
              <input type="text" name="salary" class="@error('salary') is-invalid @enderror form-control" value="{{ old('salary') }}" placeholder="Enter Job Salary" >             
            </div>
            @error('salary')
                <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror

            <div class="form-group">
              <label for="tag"><strong> Job Type: </strong></label>
              <input type="text" name="work_hours" class="@error('work_hours') is-invalid @enderror form-control" value="{{ old('work_hours') }}" placeholder="Enter Job Type" >             
            </div>
            @error('work_hours')
                <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror

            <div class="form-group">
              <label for="tag"><strong> Experience : </strong></label>
              <input type="text" name="experience" class="@error('experience') is-invalid @enderror form-control" value="{{ old('experience') }}" placeholder="Enter Experince Required" >             
            </div>
            @error('experience')
                <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror

            <div class="form-group">
              <label for="tag"><strong> Company Details </strong></label>
              <textarea rows="5" name="who_are" class="@error('who_are') is-invalid @enderror form-control"  placeholder="Enter Company Description">{{old('who_are')}}</textarea>
              @error('who_are')
                <div class="alert alert-danger mt-2">{{$message}}</div>
              @enderror          
            </div>

            <button type="submit" class="btn btn-success mt-2 "> Add Job </button>
        </form>
    </div>
</div>
    
@endsection
