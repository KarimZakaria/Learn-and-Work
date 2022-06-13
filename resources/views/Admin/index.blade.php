@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')

        <div class="row text-center">

            <div class="col-md-4 mb-4">
                <div class="card bg-light">
                    <h3 class="card-header">All Courses </h3>
                    <h2 class="card-body">{{$course_count}} </h2>
                    <a href="{{route('Admin.Course.index')}}" class="btn btn-primary">Show ►</a>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card bg-light">
                    <h3 class="card-header">All Jobs </h3>
                    <h2 class="card-body">{{$job_count}} </h2>
                    <a href="{{route('Admin.Job.index')}}" class="btn btn-primary">Show ►</a>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card bg-light">
                    <h3 class="card-header">All Users </h3>
                    <h2 class="card-body">{{$user_count}}</h2>
                    <a href="{{ route('AllUsers') }}" class="btn btn-primary">Show ►</a>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card bg-light">
                    <h3 class="card-header">All Students </h3>
                    <h2 class="card-body">{{$student_count}} </h2>
                    <a href="{{route('Admin.Student.index')}}" class="btn btn-primary">Show ►</a>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card bg-light">
                    <h3 class="card-header">All Trainers </h3>
                    <h2 class="card-body">{{$trainer_count}} </h2>
                    <a href="{{route('Admin.Trainer.index')}}" class="btn btn-primary">Show ►</a>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card bg-light">
                    <h3 class="card-header">All Categories </h3>
                    <h2 class="card-body">{{$category_count}}</h2>
                    <a href="{{route('Admin.Category.index')}}" class="btn btn-primary">Show ►</a>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card bg-light">
                    <h3 class="card-header">All Places </h3>
                    <h2 class="card-body">{{$place_count}} </h2>
                    <a href="" class="btn btn-primary">Show ►</a>
                </div>
            </div>

    </div>

@endsection

<script>
    function searchCourse()
    {
        let searchCourse = document.getElementById('search').value ;

        let url = "{{ url('admin-dashboard/courses/search') }}" + "/";

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("search").innerHTML = this.responseText;
            }
            };
            xmlhttp.open("GET", url + searchCourse, true);
            xmlhttp.send();
    }
</script>
