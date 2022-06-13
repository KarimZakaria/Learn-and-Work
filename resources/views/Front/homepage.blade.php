@extends('Front.layouts')

@section('title' , 'Home Page ')
	

@section('content')
    
<!-- Home -->
	<div class="home">
        
        <!-- Hero Slider -->
		<div class="hero_slider_container">
			<div class="hero_slider owl-carousel">
                
                <!-- Hero Slide -->
				<div class="hero_slide">
                    <div class="hero_slide_background" style="background-image:url({{asset('front/images')}}/slider_background.jpg)"></div>
					<div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
						<div class="hero_slide_content text-center">
                            <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Get your <span>Education</span> today!</h1>
						</div>
					</div>
				</div>
				
				<!-- Hero Slide -->
				<div class="hero_slide">
                    <div class="hero_slide_background" style="background-image:url({{asset('front/images')}}/news_background.jpg)"></div>
					<div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
                        <div class="hero_slide_content text-center">
							<h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Get your <span>Education</span> today!</h1>
						</div>
					</div>
				</div>
				
				<!-- Hero Slide -->
				<div class="hero_slide">
                    <div class="hero_slide_background" style="background-image:url({{asset('front/images')}}/courses_background.jpg)"></div>
					<div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
                        <div class="hero_slide_content text-center">
                            <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Get your <span>Education</span> today!</h1>
						</div>
					</div>
				</div>
                
			</div>

			<div class="hero_slider_left hero_slider_nav trans_200"><span class="trans_200"> <<<  </span></div>
			<div class="hero_slider_right hero_slider_nav trans_200"><span class="trans_200"> >>>  </span></div>
		</div>
        
	</div>

	<div class="hero_boxes"> 
        <div class="hero_boxes_inner">
            <div class="container">
                <div class="row">
                    
                    <div class="col-lg-4 hero_box_col">
                        <div class="hero_box d-flex flex-row align-items-center justify-content-start">
							<img src="{{asset('front/images')}}/earth-globe.svg" class="svg" alt="">
							<div class="hero_box_content">
                                <h2 class="hero_box_title">Online Courses</h2>
								<a href="{{ route('Courses') }}" class="hero_box_link">View More</a>
							</div>
						</div>
					</div>
                    
					<div class="col-lg-4 hero_box_col">
						<div class="hero_box d-flex flex-row align-items-center justify-content-start">
                            <img src="{{asset('front/images')}}/books.svg" class="svg" alt="">
							<div class="hero_box_content">
                                <h2 class="hero_box_title">Our Jobs</h2>
								<a href="{{route('Front.Jobs')}}" class="hero_box_link">view more</a>
							</div>
						</div>
					</div>
                    
					<div class="col-lg-4 hero_box_col">
                        <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                            <img src="{{asset('front/images')}}/professor.svg" class="svg" alt="">
							<div class="hero_box_content">
								<h2 class="hero_box_title">Our Teachers</h2>
								<a href="{{ route('AllTrainers') }}" class="hero_box_link">view more</a>
							</div>
						</div>
					</div>
                    
				</div>
			</div>
		</div>
	</div>
    
	<!-- Popular -->

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
						<h1>Popular Courses</h1>
					</div>
				</div>
			</div>

			<div class="row course_boxes">
				
				<!-- Popular Course Item -->
				@forelse ($courses as $course)					
					<div class="col-lg-4 course_box">
						
						<div class="card">
						
							<img class="card-img-top" src="{{asset('uploads/courses/'.$course->image)}}" alt="">
						
							<div class="container">
								<div class="d-flex justify-content-between mt-4">
									<h2 class="mt-2">Course Category</h2>
									<a class="btn btn-info text-white" href="{{ route('Front.Category' , $course->category->id) }}">{{$course->category->name}}</a>
								</div>
							</div>

							<div class="card-body text-center">
								<div class="card-title"><a href="{{ route('Front.show' , [$course->category->id , $course->id]) }}">{{$course->name}}</a></div>
								<div class="card-text mt-5">{{$course->preview}}</div>
							</div>
						
							<div class="price_box d-flex flex-row align-items-center">
						
								<div class="course_author_image">
									<img src="{{asset('uploads/trainers/'.$course->trainer->image)}}" alt="">
								</div>
						
								<div class="course_author_name"><a href=" {{ route('Trainer' , $course->trainer->id) }} "> <strong>{{$course->trainer->name}}</strong></a> </div>
						
								<div class="course_price d-flex flex-column align-items-center justify-content-center"><span>${{$course->price}}</span></div>
							</div>
						</div>
					</div>
				@empty
					
					<h2>There Is No Courses Added Yet !</h2>
				
				@endforelse

				<div class=" d-flex justify-content-center align-items-center w-100">
                    {!! $courses->render() !!}
                </div>

			</div>
		</div>		
	</div>

	{{-- Jobs --}}

	<div class="site-section bg-light">
        <div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>Recent Jobs</h1>
					</div>
				</div>
				</div>

			<div class="row mt-5">
				<div class="col mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
				<div class="rounded border jobs-wrap">
	
					@forelse($jobs as $job)

						<a href="{{ route('Front.Jobs.Show' , $job->id ) }}" class="job-item d-block d-md-flex align-items-center  border-bottom fulltime">
							<div class="company-logo blank-logo text-center text-md-left pl-3">
								<img src="{{ asset('uploads/jobs/' .$job->image) }}" alt="Image" class="img-fluid mx-auto">
							</div>
							<div class="job-details h-100">
								<div class="p-3 align-self-center">
								<h3>{{ $job->job_name }}</h3>
								<div class="d-block d-lg-flex">
									<div class="mr-3"><span class="icon-suitcase mr-1"></span> {{ $job->company_name }}</div>
									<div class="mr-3"><span class="icon-room mr-1"> {{ $job->location }}</span></div>
									<div><span class="icon-money mr-1"></span> ${{$job->salary}}</div>
								</div>
								</div>
							</div>
							<div class="job-category align-self-center">
								<div class="p-3">
								<span class="text-info p-2 rounded border border-info">{{$job->work_hours}}</span>
								</div>
							</div>  
						</a>
					@empty 
						<h2 class="text-center text-danger "> No Jobs Added Yet Until Now .  </h2>
					@endforelse
					
	
					
				</div>
				</div>
				<div class="col-md-12 text-center mt-5">
					<a href="{{ route('Front.Jobs') }}" class="btn btn-primary rounded py-3 px-5"><span class="icon-plus-circle"></span> Show More Jobs</a>
				  </div>
			</div>

		</div>
	</div>
  
    </div>
	{{-- Milestones --}}
	
	<div class="container mb-5">
		<div class="row">
			<div class="col">
				<div class="section_title text-center">
					<h1>Content Counter </h1>
				</div>
			</div>
		</div>
	</div>

	<div class="milestones ">

		<div class="milestones_background" style="background-image:url({{asset('front/images')}}/milestones_background.jpg)"></div>

		<div class="container pt-5">
			<div class="row">
				
				<!-- Milestone -->
				<div class="col-lg-3 milestone_col">
					<div class="milestone text-center">
						<div class="milestone_icon"><img src="{{asset('front/images/milestone_1.svg')}}" alt="https://www.flaticon.com/authors/zlatko-najdenovski"></div>
						<div class="milestone_counter" data-end-value="{{$studentsNumber}}">0</div>
						<div class="milestone_text">Current Students</div>
					</div>
				</div>

				<!-- Milestone -->
				<div class="col-lg-3 milestone_col">
					<div class="milestone text-center">
						<div class="milestone_icon"><img src="{{asset('front/images/milestone_2.svg')}}" alt="https://www.flaticon.com/authors/zlatko-najdenovski"></div>
						<div class="milestone_counter" data-end-value="{{$trainersNumber}}">0</div>
						<div class="milestone_text">Current Trainers</div>
					</div>
				</div>

				<!-- Milestone -->
				<div class="col-lg-3 milestone_col">
					<div class="milestone text-center">
						<div class="milestone_icon"><img src="{{asset('front/images/milestone_3.svg')}}" alt="https://www.flaticon.com/authors/zlatko-najdenovski"></div>
						<div class="milestone_counter" data-end-value="{{$coursesNumber}}">0</div>
						<div class="milestone_text">All Courses</div>
					</div>
				</div>

				<div class="col-lg-3 milestone_col">
					<div class="milestone text-center">
						<div class="milestone_icon"><img src="{{asset('front/images/milestone_4.svg')}}" alt="https://www.flaticon.com/authors/zlatko-najdenovski"></div>
						<div class="milestone_counter" data-end-value="{{$jobCount}}">0</div>
						<div class="milestone_text">All Jobs</div>
					</div>
				</div>

			</div>
		</div>
	</div>


	<!-- Register -->
    
	{{-- <div class="register pt-5">

		<div class="container-fluid">
            
            <div class="row row-eq-height">
				<div class="col-lg-6 nopadding">
                    
					<!-- Register -->

					<div class="register_section d-flex flex-column align-items-center justify-content-center">
						<div class="register_content text-center">
                            <h1 class="register_title">Register now and get a discount <span>50%</span> discount until 1 January</h1>
							<p class="register_text">In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum. Aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempo.</p>
							<div class="button button_1 register_button mx-auto trans_200"><a href="#">register now</a></div>
						</div>
					</div>
                    
				</div>
                
				<div class="col-lg-6 nopadding">
                    
					<!-- Search -->
                    
					<div class="search_section d-flex flex-column align-items-center justify-content-center">
                        <div class="search_background" style="background-image:url({{asset('front/images')}}/search_background.jpg);"></div>
						<div class="search_content text-center">
                            <h1 class="search_title">Search for your course</h1>
							<form id="search_form" class="search_form" action="post">
								<input id="search_form_name" class="input_field search_form_name" type="text" placeholder="Course Name" required="required" data-error="Course name is required.">
								<input id="search_form_category" class="input_field search_form_category" type="text" placeholder="Category">
								<input id="search_form_degree" class="input_field search_form_degree" type="text" placeholder="Degree">
								<button id="search_submit_button" type="submit" class="search_submit_button trans_200" value="Submit">search course</button>
							</form>
						</div> 
					</div>
                    
				</div>
			</div>
		</div>
	</div> --}}
    
	<!-- Services -->

	<div class="services page_section">
		
        <div class="container">
			<div class="row">
				<div class="col">
                    <div class="section_title text-center">
						<h1>Our Services</h1>
					</div>
				</div>
			</div>

			<div class="row services_row">

				<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
                    <div class="icon_container d-flex flex-column justify-content-end">
						<img src="{{asset('front/images')}}/earth-globe.svg" alt="">
					</div>
					<h3>Online Courses</h3>
					<p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
				</div>

				<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
                    <div class="icon_container d-flex flex-column justify-content-end">
						<img src="{{asset('front/images')}}/exam.svg" alt="">
					</div>
					<h3>Indoor Courses</h3>
					<p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
				</div>
                
				<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
                    <div class="icon_container d-flex flex-column justify-content-end">
						<img src="{{asset('front/images')}}/books.svg" alt="">
					</div>
					<h3>Amazing Library</h3>
					<p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
				</div>
                
				<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
                    <div class="icon_container d-flex flex-column justify-content-end">
						<img src="{{asset('front/images')}}/professor.svg" alt="">
					</div>
					<h3>Exceptional Professors</h3>
					<p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
				</div>

				<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
					<div class="icon_container d-flex flex-column justify-content-end">
						<img src="{{asset('front/images')}}/blackboard.svg" alt="">
					</div>
					<h3>Top Programs</h3>
					<p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
				</div>
                
				<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
                    <div class="icon_container d-flex flex-column justify-content-end">
                        <img src="{{asset('front/images')}}/mortarboard.svg" alt="">
					</div>
					<h3>Graduate Diploma</h3>
					<p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
				</div>
                
			</div>
		</div>
	</div>

	<!-- Testimonials -->
    
	<div class="testimonials page_section">
        <!-- <div class="testimonials_background" style="background-image:url({{asset('front/images')}}/testimonials_background.jpg)"></div> -->
		<div class="testimonials_background_container prlx_parent">
			<div class="testimonials_background prlx" style="background-image:url({{asset('front/images')}}/testimonials_background.jpg)"></div>
		</div>
		<div class="container">

            <div class="row">
                <div class="col">
					<div class="section_title text-center">
                        <h1>What our students say</h1>
					</div>
				</div>
			</div>
            
			<div class="row">
                <div class="col-lg-10 offset-lg-1">
					
                    <div class="testimonials_slider_container">
                        
						<!-- Testimonials Slider -->
						<div class="owl-carousel owl-theme testimonials_slider">
                            
							<!-- Testimonials Item -->
							@forelse ($tests as $test)
								
								<div class="owl-item">
									<div class="testimonials_item text-center">
										<div class="quote">“</div>
										<div class="section_title text-center">
											<h2>About {{$test->course}} Course</h2>
										</div>										
										<p class="testimonials_text">{{$test->oponion}}</p>
										<div class="testimonial_user">
											<div class="testimonial_image mx-auto">
												<img src="{{asset('uploads/tests/'. $test->image)}}" alt="">
											</div>
											<div class="testimonial_name">{{$test->name}}</div>
											<div class="testimonial_title">{{$test->status}}</div>
										</div>
									</div>
								</div>
							@empty
							<div class="d-flex justify-content-center align-items-center">
								No Testimonials Here Yet 
							</div>

							@endforelse
                                    
						</div>
                        
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer -->
@endsection