@extends('Front.layouts')

@section('title' , 'Contact Us ')

@section('styles')
    <style>
        iframe
        {
            width: 100% ; 
        }
    </style>
@endsection

@section('content')
    
<div class="home">
    <div class="home_background_container prlx_parent">
        <div class="home_background prlx" style="background-image:url({{asset('front/images/contact_background.jpg')}}"></div>
    </div>
    <div class="home_content">
        <h1>Contact</h1>
    </div>
</div>

<!-- Contact -->

{{-- Map --}}
<div class="container mt-5 ">
    @if(session()->has('success'))
        <div class="alert alert-success mt-4 text-center">
            {{session()->get('success')}}
        </div>
    @endif
</div>

<div class="container mt-5 ">
    <div class="row">
        <div class="col-12 text-center">
            {!! $settings->map !!}
        </div>
    </div>
</div>

<div class="contact">
    <div class="container">


        <div class="row">
            <div class="col-lg-8">
                
                <section class="contact-us ">
                    <div class="container">
                    <h2 class="font-weight-bold text-dark">CONTACT US</h2>
                    <form class="form-group" method="post" action="{{route('Message')}}">
                    @csrf
                        <div class="row">
                          <div class="col-md-6">
                              <div class="inputs">
                                 
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
                                
                                <input placeholder="Your Subject" name='subject' type="text"
                                class="@error('subject') is-invalid @enderror form-control my-4 py-4" value="{{old('subject')}}">
                              
                              </div>
                            </div>
                            
                            <div class="col-md-6">                   
                                <textarea  rows="9" col="9" class="@error('message') is-invalid @enderror form-control my-4 py-4" name='message' id="exampleFormControlTextarea1" placeholder="Enter Your Message">{{old('message')}}</textarea>    
                                @error('message')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="col-md-12 text-center">
                                <button type="submit" class="text-white btn btn-warning px-4 py-3">Send Message</button>
                            </div>
                        
                        </div>
                        
                        </form>
                        
                    </div>
                </section>
                    
            </div>

            <div class="col-lg-4">
                <div class="about">
                    <div class="about_title">Join Courses</div>
                    <p class="about_text">In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum. Etiam eu purus nec eros varius luctus. Praesent finibus risus facilisis ultricies. Etiam eu purus nec eros varius luctus.</p>

                    <div class="mt-5">
                        <ul>
                            <li class="contact_info_item text-dark">
                                <div class="d-flex justify-content-center">
                                    <div class="contact_info_icon">
                                        <img src="{{asset('front/images/placeholder.svg')}}">
                                    </div>
                                    <div>
                                        <h3 class="text-dark">{{$settings->city}} City</h3>{{$settings->address}}
                                        <strong>{{$settings->work_hours}}</strong>
                                    </div>
                                </div>
                            </li>
                            <li class="contact_info_item text-dark">
                                <div class="contact_info_icon">
                                    <img src="{{asset('front/images/smartphone.svg')}}">
                                </div>
                                <strong>{{$settings->phone}}</strong>
                            </li>
                            <li class="contact_info_item text-dark ">
                                <div class="contact_info_icon">
                                    <img src="{{asset('front/images/envelope.svg')}}">
                                </div> 
                                <strong>{{$settings->email}}</strong>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>

        <!-- Google Map -->

    </div>
</div>

@stop
