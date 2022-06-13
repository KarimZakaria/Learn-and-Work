<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    @yield('styles')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>

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
                <a class="navbar-brand" href="{{route('AdminDashboard')}}">
                    Super Admin Dashboard
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::guard('admin')->user()->username  }}<span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('Logout') }}">
                                        {{ __('Logout') }}
                                    </a>

                                </div>
                            </li>
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

                <div class="row ">
                    <div class="col-md-4">
                        <ul class="list-group py-4">

                            <li class="list-group-item">
                                <a href="{{route('Front.Homepage')}}">Home Page</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{route('Admin.Category.index')}}"><strong>Categories</strong></a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{route('AllUsers')}}">Users</a>
                            </li>


                            <li class="list-group-item">
                                <a href="{{ route('Admin.Trainer.index') }}">Trainers </a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{ route('Admin.Course.index') }}">Courses </a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{ route('Admin.Student.index') }}">Students </a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{ route('Admin.Category.Trashed') }}">Trashed Cat </a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{ route('Admin.Course.Trashed') }}">Trashed Courses </a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{ route('Admin.Job.index') }}"> All Jobs </a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{ route('Admin.Job.Trashed') }}"> Trashed Jobs </a>
                            </li>

                        </ul>
                    </div>

                    <div class="col-md-8">
                        <main class="py-4">
                            @yield('content')
                        </main>
                    </div>

            </div>
        </div>
    </div>
        <!-- End Authentication-->

        @yield('scripts')
</body>
</html>
