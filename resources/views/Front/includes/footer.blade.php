<footer class="footer">
    <div class="container">
        
        <!-- Newsletter -->

        <div class="newsletter">
            <div class="row">
                <div class="col">
                    <div class="section_title text-center">
                        <h1>Subscribe to newsletter</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="newsletter_form_container mx-auto">
                        <form action="{{route('Newsletter')}}" method="POST">
                            @csrf
                            <div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-center">
                                <input class="@error('email') is-invalid @enderror newsletter_email" name="email" type="email" vlaue="{{old('email')}}" placeholder="Email Address" >
                                <button  type="submit" class="newsletter_submit_btn trans_300">Subscribe</button>
                            </div>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <!-- Footer Content -->

        <div class="footer_content">
            <div class="row">

                <!-- Footer Column - About -->
                <div class="col-lg-3 footer_col ">

                    <!-- Logo -->
                    <div class="logo_container">
                        <div class="logo">
                            <img src="{{asset('uploads/settings/' .$setting->logo)}}" alt="">
                            <span>{{$setting->name}}</span>
                        </div>
                    </div>

                    <p class="footer_about_text">Hello We Are In A service Duplicated v Hello We Are In A service Duplicated Hello We Are In A service Duplicated Hello We Are In A service Duplicated</p>

                </div>

                <!-- Footer Column - Menu -->

                <div class="col-lg-3 footer_col text-center">
                    <div class="footer_column_title">Menu</div>
                    <div class="footer_column_content">
                        <ul>
                            <li class="footer_list_item"><a href="{{route('Front.Homepage')}}">Home Page</a></li>
                            <li class="footer_list_item"><a href="{{route('Courses')}}">Our Courses</a></li>
                            <li class="footer_list_item"><a href="{{route('Front.Jobs')}}">Recent Jobs </a></li>
                            <li class="footer_list_item"><a href="{{route('AllTrainers')}}">Our Trainers</a></li>
                            <li class="footer_list_item"><a href="{{route('Contact')}}">Contact Us </a></li>
                        </ul>
                    </div>
                </div>

                <!-- Footer Column - Menu -->

                <div class="col-lg-3 footer_col">
                    <div class="footer_column_title">Became A User </div>
                    <div class="footer_column_content">
                        <ul>
                            <p class="footer_list_item">Are You Intersted In Our Site And Want To Add Your Offline Course , Intership
                            Or a Job </p>
                            <div class="d-flex justify-content-between">
                                <p>Become a user </p>
                                <p class="footer_list_item"><a class="btn btn-sm btn-primary text-white" href="{{route('register')}}"> Register </a></p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p>Already User ?  </p>
                                <p class="footer_list_item"><a class="btn btn-primary text-white" class="text-info"  href="{{route('home')}}"> Login</a>
                            </div>                            
                        </ul>
                    </div>
                </div>

                <!-- Footer Column - Contact -->

                <div class="col-lg-3 footer_col">
                    <div class="footer_column_title">Contact</div>
                    <div class="footer_column_content">
                        <ul>
                            <li class="footer_contact_item">
                                <div class="footer_contact_icon">
                                    <img src="{{asset('front/images')}}/placeholder.svg">
                                </div>
                                {{ $setting->city}} City ,  {{ $setting->address}}
                            </li>
                            <li class="footer_contact_item">
                                <div class="footer_contact_icon">
                                    <img src="{{asset('front/images')}}/smartphone.svg">
                                </div>
                                {{$setting->phone}}
                            </li>
                            <li class="footer_contact_item">
                                <div class="footer_contact_icon">
                                    <img src="{{asset('front/images')}}/envelope.svg">
                                </div>{{$setting->email}}
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        <!-- Footer Copyright -->

        <div class="footer_bar d-flex flex-column flex-sm-row align-items-center">
            
            <div class="footer_social m-auto">
                <ul class="menu_social">
                    <li class="menu_social_item ml-5"><a href="{{$setting->insta }}"><i class="fab fa-instagram fa-3x"></i></a></li>
                    <li class="menu_social_item ml-5"><a href="{{$setting->facebook }}"><i class="fab fa-facebook-f fa-3x"></i></a></li>
                    <li class="menu_social_item ml-5"><a href="{{$setting->twitter }}"><i class="fab fa-twitter fa-3x"></i></a></li>
                    <li class="menu_social_item ml-5"><a href="{{$setting->linked_in }}"><i class="fab fa-linkedin-in fa-3x"></i></a></li>
                   
                </ul>
            </div>
        </div>

    </div>
</footer>

</div>

<script src="{{asset('front/js')}}/jquery-3.2.1.min.js"></script>
<script src="{{asset('front/styles')}}/bootstrap4/popper.js"></script>
<script src="{{asset('front/styles')}}/bootstrap4/bootstrap.min.js"></script>
<script src="{{asset('front/plugins')}}/greensock/TweenMax.min.js"></script>
<script src="{{asset('front/plugins')}}/greensock/TimelineMax.min.js"></script>
<script src="{{asset('front/plugins')}}/scrollmagic/ScrollMagic.min.js"></script>
<script src="{{asset('front/plugins')}}/greensock/animation.gsap.min.js"></script>
<script src="{{asset('front/plugins')}}/greensock/ScrollToPlugin.min.js"></script>
<script src="{{asset('front/plugins')}}/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="{{asset('front/plugins')}}/scrollTo/jquery.scrollTo.min.js"></script>
<script src="{{asset('front/plugins')}}/easing/easing.js"></script>
<script src="{{asset('front/js')}}/custom.js"></script>
<script src="{{asset('front/js/teachers_custom.js')}}"></script>

@yield('scripts')

</body>
</html>