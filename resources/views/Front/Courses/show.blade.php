@extends('Front.layouts')

@section('title' , $course->name .' Course')
    
@section('content')

    <div class="home">
        <div class="home_background_container prlx_parent">
            <div class="home_background prlx" style="background-image:url({{asset('front/images/courses_background.jpg')}}"></div>
        </div>
        <div class="home_content text-white">
            <h3>Courses<span> / </span>{{ $course->category->name}}<span> / </span>{{ $course->name}}</h3>
        </div>
    </div>

    <div class="container mt-5 ">
        @if(session()->has('success'))
            <div class="alert alert-success mt-4 text-center">
                {{session()->get('success')}}
            </div>
        @endif
    </div>

    <div class="popular page_section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title text-center">
                        <h1>Special Courses</h1>
                    </div>
                </div>
            </div>

            <div class="row course_boxes">
                
                <!-- Popular Course Item -->
					<div class="col-lg-8  mt-5 mb-5">
						
						<div class="card">
						
							<img class="card-img-top" src="{{asset('uploads/courses/'.$course->image)}}" alt="">
						
							<div class="container pt-3 pb-3 ">
								<div class="d-flex justify-content-between mt-4">
									<h2 class="mt-2 text-info">Course Category</h2>
									<a class="btn btn-info text-white" href="{{ route('Front.Category' , $course->category->id) }}">{{$course->category->name}}</a>
								</div>
                            </div>
                            
                            <div class="container mt-4 pt-3 pb-3 bg-dark">
                                <h2 class="text-center text-info mb-4">Course Name </h2>
                                <div class="card-text text-center text-white">{{$course->name}}</div>
                            </div>
                                
                            <div class="container mt-4 pt-3 pb-3 bg-dark">
                                <h2 class="text-center text-info mb-4">Course Preview </h2>
                                <div class="card-text text-center text-white">{{$course->preview}}</div>
                            </div>


                            <div class="container pt-3 pb-3 mt-4 bg-dark">
                                <h2 class="text-center text-info  mb-4">Course Description </h2>
                                <div class="card-text text-center text-white ">{!! $course->description !!}</div>                                    
                            </div>
                        
                                <div class="price_box d-flex flex-row align-items-center">
                            
                                    <div class="course_author_image">
                                        <img src="{{asset('uploads/trainers/'.$course->trainer->image)}}" alt="">
                                    </div>
                            
                                    <div class="course_author_name"><a href="{{route('Trainer' , $course->trainer->id)}}"> <strong>{{$course->trainer->name}}</strong></a></div>
                            
                                    <div class="course_price d-flex flex-column align-items-center justify-content-center"><span>${{$course->price}}</span></div>
                                </div>
						</div>
                    </div>


                    {{-- Details on Course  --}}
                    <div class="col-lg-4 course_box mt-5 mb-5 bg-dark">
                        <div class="container mt-4 ">
                            <h2 class=" text-info mb-4">Course Avalible Places </h2>
                            @forelse ($course->place as $place)
                                <li class="pb-3 card-text text-white">{{$place->location}}</li>
                            @empty
                                No Place Availible For This Course
                            @endforelse
                        </div>
                        
                        <div class="container mt-4 ">
                            <h2 class=" text-info mb-4">Trainer Details </h2>
                            <div class="d-flex justify-content-between">
                                <div>                                                               
                                    <h2 class="pb-3 card-text text-white mb-2"><span class="text-danger">Name : </span>{{$course->trainer->name}}</h2>
                                    <h2 class="pb-3 card-text text-white mb-2"><span class="text-danger">Email : </span>{{$course->trainer->email}}</h2>
                                    <h2 class="pb-3 card-text text-white mb-2"><span class="text-danger">Phone : </span>{{$course->trainer->phone}}</h2>
                                    <h2 class="pb-3 card-text text-white"><span class="text-danger">Speciallity : </span>{{$course->trainer->speciallity}}</h2>
                                    <h2 class="pb-3 card-text text-white"><span class="text-danger">Enrolling : </span>{{$course->student ->count()}} Student </h2>
                                </div>
                                <a href="{{route('Trainer' , $course->trainer->id)}}"><img class="rounded-circle" width="70px" height="80px" src="{{asset('uploads/trainers/' .$course->trainer->image)}}" alt=""></a>
                            </div>
                        

                            <div class="my-5">
                                <h1 class="text-center text-info">Enrolling Course</h1>
                                <form class="form-group" method="post" action="{{route('Enroll')}}">
                                @csrf
                                    <input type='hidden' name="course_id" value="{{$course->id}}">
                                    
                                    <input placeholder="your Name*" name='name' type="text"
                                    class="@error('name') is-invalid @enderror form-control my-4 py-4" value="{{old('name')}}">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                            
                                    <input placeholder="your Email*" name='email' type="text"
                                    class="@error('email') is-invalid @enderror form-control my-4 py-4" value="{{old('email')}}">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                            
                                    <input placeholder="Your Speciallity" name='speciallity' type="text"
                                    class="@error('speciallity') is-invalid @enderror form-control my-4 py-4" value="{{old('speciallity')}}">
                                    
                                    <input placeholder="your Age*(Not Required)" name='age' type="text"
                                    class="@error('age') is-invalid @enderror form-control my-4 py-4" value="{{old('age')}}">
                                    
                                    <textarea class='col-12 form-group my-4 py-4' name="education" placeholder="Enter Your Education(Not Required)" rows="7">{{old('education')}}</textarea>
                                    
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="text-white btn btn-primary px-4 py-3"> Enroll Course</button>
                                    </div> 


                                </form>
                            </div>
                        </div>
                    </div>

                    
            </div>
        </div>		
    </div>

@stop

