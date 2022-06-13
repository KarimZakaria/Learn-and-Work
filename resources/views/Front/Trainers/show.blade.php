@extends('Front.layouts')

@section('title' , $trainer->name. "'s Page")

@section('content')


<div class="home">
    <div class="home_background_container prlx_parent">
        <div class="home_background prlx" style="background-image:url({{asset('front/images/teachers_background.jpg')}}"></div>
    </div>
    <div class="home_content text-white">
        <h3>Trainer<span> / </span> {{$trainer->name}}</h3>
    </div>
</div>


<!-- Teachers -->

    <div class="teachers page_section">
         
          <div class="container">
            <div class="row">
                
                <!-- Teacher -->
                <div class="container">

                    <div class="card_img">
                        <img class="card-img-top trans_200" src="{{asset('uploads/trainers/' .$trainer->image)}}" >
                    </div>

                    <div class="card-body  bg-light">
                        <div class="card-title mt-3 mb-3">{{$trainer->name}}</div>
                        <div class="card-text  mt-3 mb-3">{{$trainer->speciallity}}</div>
                        <div class="card-text  mt-3 mb-3">{{$trainer->details}}</div>
                        <div class="card-text  mt-3 mb-3">{!! $trainer->preview !!}</div>
                        <div class="card-text  mt-3 mb-3">{{$trainer->email}}</div>
                        <div class="card-text  mt-3 mb-3">{{$trainer->phone}}</div>
                        @foreach ($trainer->course as $course)
                            <a href="{{route('Front.show' , [ $course->category->id ,$course->id])}}"><li>{{$course->name}}</li>
                        @endforeach
                        <div class="teacher_social">
                            <ul class="menu_social">
                                <li class="menu_social_item"><a href="#"><i class="fab fa-pinterest "></i></a></li>
                                <li class="menu_social_item"><a href="#"><i class="fab fa-linkedin-in "></i></a></li>
                                <li class="menu_social_item"><a href="#"><i class="fab fa-instagram "></i></a></li>
                                <li class="menu_social_item"><a href="#"><i class="fab fa-facebook-f "></i></a></li>
                                <li class="menu_social_item"><a href="#"><i class="fab fa-twitter "></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                        
            </div>
        </div>
    </div>
@endsection