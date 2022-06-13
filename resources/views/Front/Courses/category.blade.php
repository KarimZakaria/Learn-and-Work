@extends('Front.layouts')

@section('content')

@section('title' , $categories->name .' Category' )

    <div class="home">
        <div class="home_background_container prlx_parent">
            <div class="home_background prlx" style="background-image:url({{asset('front/images/courses_background.jpg')}}"></div>
        </div>
        <div class="home_content">
            <h1>Courses<span>/</span>Category<span>/</span>{{$categories->name}}</h1>
        </div>
    </div>

    <!-- Popular -->

    <div class="popular page_section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title text-center">
                        <h1>Special Courses</h1>
                        <h1>{{$categories->name}} Category</h1>
                    </div>
                </div>
            </div>

            <div class="row course_boxes">
                
                <!-- Popular Course Item -->
                @forelse ($courses as $course)					
					<div class="col-lg-4 course_box mt-5 mb-5">
						
						<div class="card">
						
							<img class="card-img-top" src="{{asset('uploads/courses/'.$course->image)}}" alt="">
						
							<div class="container">
								<div class="d-flex justify-content-between mt-4">
									<h2 class="mt-2">Course Category</h2>
									<a class="btn btn-info text-white" href="{{route('Front.Category' , $course->category->id)}}">{{$course->category->name}}</a>
								</div>
							</div>

							<div class="card-body text-center">
								<div class="card-title"><a href="{{route('Front.show' , [$course->category->id , $course->id])}}">{{$course->name}}</a></div>
								<div class="card-text mt-5">{{$course->preview}}</div>
							</div>
						
							<div class="price_box d-flex flex-row align-items-center">
						
								<div class="course_author_image">
									<a href="{{route('Trainer' , $course->trainer->id)}}"><img src="{{asset('uploads/trainers/'.$course->trainer->image)}}" alt=""></a>
								</div>
						
								<div class="course_author_name"><a href="{{route('Trainer' , $course->trainer->id)}}"> <strong>{{$course->trainer->name}}</strong></a> <span>Author</span></div>
						
								<div class="course_price d-flex flex-column align-items-center justify-content-center"><span>${{$course->price}}</span></div>
							</div>
						</div>
					</div>
				@empty
					
					<h1 class="text-danger w-100 text-center">There Is No Courses Added Yet !</h1>
				
                @endforelse
                <div class="mt-5 d-flex justify-content-center align-items-center w-100">
                    {!! $courses->render() !!}
                </div>

            </div>
        </div>		
    </div>

@stop