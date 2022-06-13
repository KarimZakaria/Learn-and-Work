<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>User Dashboard</title>
    @yield('styles')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ asset('home') }}">
                    User Dashboard
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            @if(session()->has('success'))
                <div class="alert alert-success mt-4 text-center">
                    {{session()->get('success')}}
                </div>
            @endif
        </div>

        <div class="container">
            @if(Auth::user())

                <div class="row">
                    <div class="col-md-4 py-4">
                        <div class="card">
                            <div class="card-header"> User Dashboard</div>
                            <div class="card-body">
                                Hello <strong class="text-primary"> {{Auth::user()->name}} </strong> Here you have Rigestered on our
                                Site so you have now the Permission to add an oppourtuinity for a job , intrshipp or an offline Course ,
                                Please Remmeber to keep adds respectful and to follow our Community Guodelines
                            </div>
                        </div>

                        <h4 class="text-center mt-4">Permissions Allowed </h4>
                        <div class="card mt-2">
                            <ul class="list-group ">

                                <li class="list-group-item">
                                    <a  href="{{route('home')}}">Home Page</a>
                                </li>

                                <li class="list-group-item">
                                    <a href="{{route('User.createCategory')}}">Add Category</a>
                                </li>

                                <li class="list-group-item">
                                    <a href="{{route('User.createCourse')}}">Add Course</a>
                                </li>

                                <li class="list-group-item">
                                    <a href="{{route('User.createTrainer')}}">Add Trainer</a>
                                </li>

                                <li class="list-group-item">
                                    <a href="{{route('User.createJob')}}">Add Job</a>
                                </li>

                            </ul>
                        </div>

                    </div>
                    <div class="col-md-8">
                        <main class="py-4">
                            @yield('content')
                        </main>
                    </div>
                </div>
            @else
                <div class="col-md-12">
                    <main class="py-4">
                        @yield('content')
                    </main>
                </div>
            @endif

        </div>
    </div>

    </div>
    @yield('scripts')
</body>
</html>
