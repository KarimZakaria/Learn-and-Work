@extends('layouts.userapp')

@section('content')

<div class="d-flex justify-content-between">
    <h2 class="mt-2">Course Creation </h2>
</div>
<div class="card card-default">

    <div class="card card-default">

    <div class="card-body">
        <form action=" {{ route('User.storeCategory') }}" method="POST">
           @csrf
            <div class="form-group">
              <label for="tag"><strong> Category Name: </strong></label>
              <input type="text" name="name" class="@error('name') is-invalid @enderror form-control" value="{{ old('name') }}" placeholder="Enter Course Name" >
            </div>
            @error('name')
              <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror
            <button type="submit" class="btn btn-success mt-2 "> Add Category </button>
        </form>
    </div>
</div>

@endsection
