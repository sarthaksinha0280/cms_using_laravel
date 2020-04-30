<!DOCTYPE html>
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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>
<br>
app.blade.php
<body style="background-color:lightyellow">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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
                                    
                                <a class="dropdown-item" href="{{ route('users.edit-profile') }}">
                                      
                                      My profile
                                     </a>
 

                                  
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

        <main class="py-4">
      
        @auth <!-- if user is authenticated then page is login -->
  
  <div class="container">
  
  @if(session()->has('success'))
<div class="alert alert-success">
{{ session()->get('success') }}
</div>
 @endif

@if(session()->has('error'))
<div class="alert alert-danger">
{{ session()->get('error') }}
</div>
        @endif
  
  <div class="row">
  <div class="col-md-4">
  <ul class="list-group">


<!-- for users only     -->
@if(auth()->user()->isAdmin())

<li class="list-group-item">
  <a href="{{ route('users.index')}}">
  
  Users
  
  </a>
  
  </li>

@endif



  <li class="list-group-item bg-dark">
  <a href="{{ route('posts.index')}}" style="color:white">Posts</a>
  </li>

  <li class="list-group-item bg-dark">
  <a href="{{route('tags.index')}}" style="color:white">Tags</a>
  </li>
  
  <!--  here we check the index in the route   -->
  <li class="list-group-item bg-dark">
  <a href="{{route('categories.index')}}" style="color:white">Categories</a>
  </li>
  </ul>
  
  <ul class="list-group mt-5">
  <li class="list-group-item bg-dark">
  
  <a href="{{ route('trashed-posts.index')}}" style="color:white">Trash Posts</a>  
  
  </li>
  </ul>
  
  </div>
  
  
  <div class="col-md-8">
  @yield('content') <!-- this show the content of selected route form the above list   -->
  </div>
  </div>  
  </div> 
  
  @else<!-- else user is not authenticated then only show content-->
  
  @yield('content')<!--this show the login and regsiter page in the application   -->
 
  @endauth
        </main>
    </div>
    <!-- this file is not need to include bcz laravel provide all os these
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"  crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"  crossorigin="anonymous"></script>
 -->
  <!-- Scripts -->
 <!-- <script src="{{ asset('js/app.js') }}" defer></script> hear defer is block the code to link with file -->
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
 @yield('scripts')
</body>
</html>
