<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 <head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device width, initial-scale=1">
 <title>SISTEM DATABASE BLUE ARCHIVE</title>
 <!-- Fonts -->
 <link 
href="https://fonts.bunny.net/css2?family=Nunito:wght@4
00;600;700&display=swap" rel="stylesheet">
 <!-- Styles -->
 <link 
href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist
/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-
iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZ
hlZB6+fzT" crossorigin="anonymous">
 <style>
 body {
 font-family: 'Nunito', sans-serif;
 }
 </style>
 </head>
 <body class="antialiased">
 <nav class="navbar bg-light">
 <div class="container-fluid">
 <a class="navbar-brand" href="{{ route('Profil.index') }}">SISTEM DATABASE BLUE ARCHIVE</a>
                                <ul class="navbar-nav ms-auto"><a class="nav-link" href="{{ route('Characters.index') }}">Manage Characters</a></ul>
                                <ul class="navbar-nav ms-auto"><a class="nav-link" href="{{ route('Profil.index') }}">Manage Profil</a></ul>
                                <ul class="navbar-nav ms-auto"><a class="nav-link" href="{{ route('School.index') }}">Manage School</a></ul>
                                <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('join.index') }}"
                                        onclick="href="{{ route('join.index')}}">
                                        {{ __('Hidden Gems') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                            </div>
 </nav>
 <div class="container">
 @yield('content')
 </div>
 <script 
src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/
js/bootstrap.bundle.min.js" integrity="sha384-
u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPO
OmMi466C8" crossorigin="anonymous"></script>