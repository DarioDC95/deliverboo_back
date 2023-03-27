<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Fontawesome 6 cdn -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css' integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==' crossorigin='anonymous' referrerpolicy='no-referrer' />

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<style>
    @media (min-width: 768px) {
       .vh-side{height: 100vh;} 
    }
</style>

<body>
    <div id="app">

        <header class="navbar flex-row navbar-expand-md navbar-dark sticky-top  flex-md-nowrap p-3  shadow" style="background-color:#159895">
            <a class="navbar-brand col-md-3 col-lg-2 me-0" href="/"><img style="width: 10rem" src="{{Vite::asset('resources/img/logo-white.png')}}" alt=""></a>
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            {{-- <input class="form-control form-control-dark w-50" type="text" Placeholder="Search"> --}}
            <div class="collapse navbar-collapse justify-content-md-end ms-3 show">

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('admin.restaurants.index') }}">Dashboard</a>
                            <a class="dropdown-item" href="{{ url('profile') }}">{{__('Profile')}}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </header>
        <div class="container-fluid vh-side">
            <div class="row h-100">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block navbar-dark sidebar collapse" style="background-color:#159895">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">

                                <a class="nav-link  text-white {{ Route::currentRouteName() == 'admin.restaurants.index' ? 'bg-selected' : '' }}" href="{{route('admin.restaurants.index')}}">
                                    <div class="d-flex align-items-center">
                                        <img class="me-2" style="width: 2rem ; filter: invert(1)  " src="{{Vite::asset('resources/img/rist-copia.png')}}" alt="">  <span>Ristorante</span>
                                    </div>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.dishes.index' ? 'bg-selected' : '' }}" href="{{route('admin.dishes.index')}}">
                                    <div class="d-flex align-items-center">
                                        <img class="me-2" style="width: 2rem ; filter: invert(1)  " src="{{Vite::asset('resources/img/dish-icon.jpg')}}" alt="">  <span>Piatti</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>
</html>
