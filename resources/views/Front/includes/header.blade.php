<!DOCTYPE html>
<html lang="en">
<head>
<title>@yield('title')</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{asset('front/styles/contact_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('front/styles/contact_responsive.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('front/styles/teachers_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('front/styles/teachers_responsive.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('front/styles/courses_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('front/styles/courses_responsive.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('front/styles/teachers_responsive.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('front/styles/teachers_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('front/styles')}}/bootstrap4/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('front/plugins')}}/fontawesome-free-5.0.1/css/fontawesome-all.css">
<link rel="stylesheet" type="text/css" href="{{asset('front/plugins')}}/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="{{asset('front/plugins')}}/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="{{asset('front/plugins')}}/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="{{asset('front/styles')}}/main_styles.css">
<link rel="stylesheet" type="text/css" href="{{asset('front/styles')}}/responsive.css">
<link rel="stylesheet" type="text/css" href="{{asset('front/styles')}}/style.css">
<link rel="stylesheet" href="{{asset('front/styles/fonts/icomoon/style.css')}}">



@yield('styles')

</head>
<body>

<div class="super_container">

	<!-- Header -->

	<header class="header d-flex flex-row">
		<div class="header_content d-flex flex-row align-items-center">
			<!-- Logo -->
			<div class="logo_container">
				<div class="logo">
					<a href="{{route('Front.Homepage')}}">
						<img src="{{asset('uploads/settings/' .$setting->logo)}}" alt="">
						<span>offline</span>
					</a>
				</div>
			</div>

			<!-- Main Navigation -->
			<nav class="main_nav_container">
				<div class="main_nav">
					<ul class="main_nav_list">
						<li class="main_nav_item"><a href="{{route('Front.Homepage')}}">home</a></li>
						<li class="nav-item dropdown main_nav_item">
							<a class="nav-link dropdown-toggle"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Catregory
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								@foreach ($categories as $category)
								   <a class="dropdown-item" href="{{route('Front.Category' , $category->id)}}">{{$category->name}}</a>
								@endforeach
							</div>
						</li>
						<li class="main_nav_item"><a href="{{route('Courses')}}">Courses</a></li>
						<li class="main_nav_item"><a href="{{route('AllTrainers')}}">Trainers</a></li>
						<li class="main_nav_item"><a href="{{route('Contact')}}">contact</a></li>
						
					</ul>
				</div>
			</nav>
		</div>
		<div class="header_side d-flex flex-row justify-content-center align-items-center">
			<li class="list-unstyled job"><a href="{{route('Front.Jobs')}}">See Jobs</a></li>
		</div>

		<!-- Hamburger -->
		<div class="hamburger_container">
			<i class="fas fa-bars trans_200"></i>
		</div>

	</header>
	
	<!-- Menu -->
	<div class="menu_container menu_mm">

		<!-- Menu Close Button -->
		<div class="menu_close_container">
			<div class="menu_close"></div>
		</div>

		<!-- Menu Items -->
		<div class="menu_inner menu_mm">
			<div class="menu menu_mm">
				<ul class="menu_list menu_mm">
					<li class="menu_item menu_mm"><a href="{{route('Front.Homepage')}}">Home</a></li>
					<li class="menu_item menu_mm"><a href="{{route('Courses')}}">Courses</a></li>
					<li class="menu_item menu_mm"><a href="{{route('AllTrainers')}}">Trainers</a></li>
					<li class="menu_item menu_mm"><a href="{{route('Front.Homepage')}}">Jobs</a></li>
					<li class="menu_item menu_mm"><a href="{{route('Contact')}}">Contact</a></li>
				</ul>
			</div>
		</div>
	</div>