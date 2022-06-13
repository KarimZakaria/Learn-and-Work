@extends('Front.layouts')

@section('title' , 'All Trainers')
    
@section('content')

<div class="home">
    <div class="home_background_container prlx_parent">
        <div class="home_background prlx" style="background-image:url({{asset('front/images/teachers_background.jpg')}}"></div>
    </div>
    <div class="home_content">
        <h1>All Trainers </h1>
    </div>
</div>


<!-- Teachers -->

    <div class="teachers page_section">
        <div class="container">
            <div class="row">

                <!-- Teacher -->
                @forelse($trainers as $trainer)
                    <div class="col-lg-4 teacher">
                        <div class="card">
                            <div class="card_img">
                                <div class="card_plus trans_200 text-center"><a href="{{route('Trainer' , $trainer->id)}}">+</a></div>
                                <img class="card-img-top trans_200" src="{{asset('uploads/trainers/' .$trainer->image)}}">
                            </div>
                            <div class="card-body text-center">
                                <div class="card-title"><a href="{{route('Trainer' , $trainer->id)}}">{{$trainer->name}}</a></div>
                                <div class="card-text">{{$trainer->speciallity}}</div>
                                <div class="teacher_social">
                                    <ul class="menu_social">
                                        <li class="menu_social_item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                        <li class="menu_social_item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li class="menu_social_item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li class="menu_social_item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li class="menu_social_item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> 
                @empty
                    There is No Trainers Here 
                @endforelse
                <div class="mt-5 d-flex justify-content-center align-items-center w-100">
                    {!! $trainers->render() !!}
                </div>
                


            </div>
        </div>
    </div>
@endsection