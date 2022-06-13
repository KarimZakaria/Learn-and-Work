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
                            <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Get your  <span> Job Title</span> today!</h1>
						</div>
					</div>
				</div>
				
				<!-- Hero Slide -->
				<div class="hero_slide">
                    <div class="hero_slide_background" style="background-image:url({{asset('front/images')}}/news_background.jpg)"></div>
					<div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
                        <div class="hero_slide_content text-center">
							<h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Get your <span> Job Title</span> today!</h1>
						</div>
					</div>
				</div>
				
				<!-- Hero Slide -->
				<div class="hero_slide">
                    <div class="hero_slide_background" style="background-image:url({{asset('front/images')}}/courses_background.jpg)"></div>
					<div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
                        <div class="hero_slide_content text-center">
                            <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Get your <span> Job Title</span> today!</h1>
						</div>
					</div>
				</div>
                
			</div>

			<div class="hero_slider_left hero_slider_nav trans_200"><span class="trans_200"> <<<  </span></div>
			<div class="hero_slider_right hero_slider_nav trans_200"><span class="trans_200"> >>>  </span></div>
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
						<h1>Recent Jobs </h1>
					</div>
				</div>
			</div>

			<div class="row course_boxes text-dark">
				
				<!-- Popular Jobs Item -->
				@forelse ($jobs as $job)					
					<div class="col-lg-6 course_box py-5 ">
						
						<div class="card">
						
							<img class="card-img-top" src="{{asset('uploads/jobs/'.$job->image)}}" alt="">
						
							<div class="container">
								<div class="d-flex justify-content-between mt-2">
									<h2 class="mt-2">Job Name</h2>
									<a class="btn btn-info text-white" href="{{ route('Front.Jobs.Show' , $job->id )}}">{{$job->job_name}}</a>
								</div>
							</div>

							<div class="card-body text-center">
								<div class="card-title"><a href="">{{$job->company_name}}</a></div>
								<div class="card-text mt-3 pb-5">{{$job->preview}}</div>
                            </div> 
						</div>
					</div>
				@empty
					
					<h2>There Is No Jobs Added Yet !</h2>
				
				@endforelse

				<div class="mt-5 d-flex justify-content-center align-items-center w-100">
                    {!! $jobs->render() !!}
                </div>

			</div>
		</div>		
    </div>
            </div>
          </div>
        </div>
      </div>


	
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
    
	

	<!-- Footer -->
@endsection