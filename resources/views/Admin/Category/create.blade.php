@extends('layouts.app')

@section('title', 'Create New Category')

@section('content')

<div class="d-flex justify-content-between">
    <h2 class="mt-2">Category Creation </h2>

     <a href="{{route('Admin.Category.index')}}" class="btn btn-success"
     style="margin-bottom: 5px">Back</a>

</div>
<div class="card card-default">

    <div class="card card-default">

    <div class="card-body">
        <form action="{{route('Admin.Category.store')}}" method="POST">
           @csrf
            <div class="form-group">
              <label for="tag"><strong> Category Name: </strong></label>
              <input type="text" name="name" class="@error('name') is-invalid @enderror form-control" value="{{old('name')}}"
              placeholder="Enter Category Name" >
              @error('name')
                <div class="alert alert-danger mt-2">{{$message}}</div>
              @enderror
              <button type="submit" class="btn btn-success mt-2 "> Add Category </button>
            </div>
        </form>
    </div>
</div>

@endsection
