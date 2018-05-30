<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{{ asset('assets/favicon.png') }}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{{ asset('assets/favicon/apple-touch-icon.png') }}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{{ asset('assets/favicon/favicon-32x32.png') }}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{{ asset('assets/favicon/favicon-16x16.png') }}}">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script defer src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src={{ asset('js/app.js') }} defer></script>
  </head>
  <body>
    <header>
        <nav class="navbar navbar-expand-md fixed-top navbar-light">
            <div class="container">
                <!-- HAMBURGER -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- LOGO -->
                <a class="navbar-brand mr-auto" href="{{ url('/') }}">Sweven</a>

                <ul class="navbar-nav d-flex flex-row align-items-center">
                    <!-- DROPDOWN -->
                    <li class="nav-item dropdown d-none d-md-block">
                        <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            Products
                        </a>

                        <div id="nav-dropdown" class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <div class="triangle"></div>
                            <h6 class="dropdown-header">Shop By Category</h6>
                            <div class="dropdown-divider"></div>
                            @foreach ($navCategories as $category)
                                <a id="nav-cat-{{$category->id}}" class="dropdown-item" href="{{ route('category_products', ['id' => $category->id]) }}">{{ $category->name }}</a>
                            @endforeach
                        </div>
                    </li>
                    <!-- SEARCH -->
                    <li>
                        <form class="form-inline search-container d-none d-md-flex" action="/search" method="get">
                            <i class="fas fa-search search-icon"></i>
                            <input class="form-control mr-sm-2" type="text" name="keyword" placeholder="Search" required>
                        </form>
                    </li>
                    <!-- ICONS -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('wishlist')}}">
                            <i class="fas fa-heart"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/cart')}}">
                            <i class="fas fa-shopping-bag"></i>
                        </a>
                    </li>
                    @if (Auth::check())
                        @if (Route::currentRouteName() == 'profile' || Route::currentRouteName() == 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">
                                <i class="fas fa-power-off"></i>
                            </a>
                        </li>
                        @else
                            @if(Auth::user()->isAdmin())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin') }}">
                                        <i class="fas fa-user"></i>
                                    </a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('profile', [Auth::id()]) }}">
                                        <i class="fas fa-user"></i>
                                    </a>
                                </li>
                            @endif
                        @endif
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                    </li>
                    @endif
                </ul>

                <!-- MOBILE MENU -->
                <div class="d-block d-md-none w-100">
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <h6>Shop By Category</h6>
                                <hr>
                            </li>
                            @foreach ($navCategories as $category)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('category_products', ['id' => $category->id]) }}">{{ $category->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <form class="search-container-mobile d-flex flex-row flex-nowrap d-md-none form-inline my-2 my-lg-0">
                    <input class="form-control mr-2 w-100" type="text" placeholder="Search">
                    <button class="btn my-2 my-sm-0" type="submit">
                        <i class="fas fa-search search-icon"></i>
                    </button>
                </form>
            </div>
        </nav>
    </header>
        <div id="loader_page">
            <div id="loader"></div>
        </div>
       @yield('content')
    <footer class="page-footer">
      <div class="container">
          <div class="row">
              <div class="col-md-6">
                  <h5 class="title">Help</h5>
                  <ul class="list-unstyled">
                      <li>
                          <a href="{{ url('/contact') }}">Contact</a>
                      </li>
                      <li>
                          <a href="{{ route('faq') }}">FAQs</a>
                      </li>
                      <li>
                          <a href="{{ url('/about') }}">About</a>
                      </li>
                  </ul>
              </div>

              <div class="col-md-6 d-flex justify-content-end align-items-end">
                  <p>© Copyright 2018 Sweven. All rights reserved.</p>
              </div>
          </div>
      </div>
    </footer>
  </body>
</html>
