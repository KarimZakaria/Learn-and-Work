@extends('layouts.app')

@section('content')

<h2 class="">Edit / Category / {{$category->name}} </h2>

<div class="card card-default">

    <div class="card card-default">

        <div class="clearfix">

             <a href="{{route('Admin.Category.index')}}" class="btn btn-success float-right"
             style="margin-bottom: 10px">Back</a>

        </div>

    <div class="card-body">

        <form action="{{route('Admin.Category.update')}}" method="POST">
           @csrf
            <input type="hidden" name="id" value=" {{ $category->id }}">

            <div class="form-group">
              <label for="tag">Category Name: </label>
              <input type="text" name="name" class="@error('name') is-invalid @enderror form-control" placeholder="Enter Cat Name" value="{{$category->name}}">
              @error('name')
                <div class="alert alert-danger mt-2">{{$message}}</div>
              @enderror
              <button type="submit" class="btn btn-success mt-2 "> Update </button>
            </div>
        </form>
    </div>
</div>

@endsection
