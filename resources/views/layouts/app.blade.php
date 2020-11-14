<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'The News Today') }} :: @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <!-- ##### Header Area Start ##### -->
        <header class="header-area">



                    <div class="row justify-content-between" style="background: blueviolet;">
                        <div class="col-md-8 py-2" style="color: white;">
                            <a class="navbar-brand d-block px-4" href="{{ route('home') }}" style=" color:white; font-family: 'Tangerine', cursive; font-size: 50px; font-weight: bold; display: block;">The News Today</a>
                            <span class="px-4"> {{ today()->dayName.' , '. today()->monthName.' '.today()->day.',  '.today()->yearIso}}    </span>

                        </div>
                        <div class="right-side-menu col-md-4">
                            <div class="">
                                @guest
                                    <div class="">
                                        <div class="auth-area" style="width: 100px; float: right;"> <a class="" href="{{ route('login') }}">Login</a></div>

                                    </div>
                                @else
                                    <div class="auth-area text-center mask f lex-center rgba-red-strong" style="width: 100px; float: right">
                                        <a class="font-weight-bold" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                @endguest
                            </div>
                        </div>
                    </div>


        </header>
        <!-- ##### Header Area End ##### -->

        <main class="">
            @yield('content')
        </main>

        <!-- ##### Footer Area Start ##### -->
        <footer class="footer-area">

            <!-- Main Footer Area -->
            <div class="main-footer-area">
                <div class="container">
                    <div class="row">

                        <!-- Footer Widget Area -->
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="footer-widget-area mt-80">
                                <!-- Footer Logo -->
                                <div class="footer-logo">
                                    <a href="index.html"><img src="img/core-img/logo.png" alt=""></a>
                                </div>
                                <!-- List -->
                                <ul class="list">
                                    <li><a href="mailto:contact@youremail.com">contact@youremail.com</a></li>
                                    <li><a href="tel:+4352782883884">01923927992</a></li>
                                    <li><a href="http://yoursitename.com">www.newspaper.com</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Footer Widget Area -->
                        <div class="col-12 col-sm-6 col-lg-2">
                            <div class="footer-widget-area mt-80">
                                <!-- Title -->
                                <h4 class="widget-title">Politics</h4>
                                <!-- List -->
                                <ul class="list">
                                    <li><a href="#">Business</a></li>
                                    <li><a href="#">Markets</a></li>
                                    <li><a href="#">Tech</a></li>
                                    <li><a href="#">Luxury</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Footer Widget Area -->
                        <div class="col-12 col-sm-4 col-lg-2">
                            <div class="footer-widget-area mt-80">
                                <!-- Title -->
                                <h4 class="widget-title">Featured</h4>
                                <!-- List -->
                                <ul class="list">
                                    <li><a href="#">Football</a></li>
                                    <li><a href="#">Golf</a></li>
                                    <li><a href="#">Tennis</a></li>
                                    <li><a href="#">Motorsport</a></li>
                                    <li><a href="#">Horseracing</a></li>
                                    <li><a href="#">Equestrian</a></li>
                                    <li><a href="#">Sailing</a></li>
                                    <li><a href="#">Skiing</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Footer Widget Area -->
                        <div class="col-12 col-sm-4 col-lg-2">
                            <div class="footer-widget-area mt-80">
                                <!-- Title -->
                                <h4 class="widget-title">FAQ</h4>
                                <!-- List -->
                                <ul class="list">
                                    <li><a href="#">Aviation</a></li>
                                    <li><a href="#">Business</a></li>
                                    <li><a href="#">Traveller</a></li>
                                    <li><a href="#">Destinations</a></li>
                                    <li><a href="#">Features</a></li>
                                    <li><a href="#">Food/Drink</a></li>
                                    <li><a href="#">Hotels</a></li>
                                    <li><a href="#">Partner Hotels</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Footer Widget Area -->
                        <div class="col-12 col-sm-4 col-lg-2">
                            <div class="footer-widget-area mt-80">
                                <!-- Title -->
                                <h4 class="widget-title">+More</h4>
                                <!-- List -->
                                <ul class="list">
                                    <li><a href="#">Fashion</a></li>
                                    <li><a href="#">Design</a></li>
                                    <li><a href="#">Architecture</a></li>
                                    <li><a href="#">Arts</a></li>
                                    <li><a href="#">Autos</a></li>
                                    <li><a href="#">Luxury</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Footer Area -->
            <div class="bottom-footer-area">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <!-- Copywrite -->
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- ##### Footer Area Start ##### -->

    </div>

    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('js/bootstrap/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <!-- All Plugins js -->
    <script src="{{ asset('js/plugins/plugins.js') }}"></script>
    <!-- Active js -->
    <script src="{{ asset('js/active.js') }}"></script>

</body>
<style>

</style>
</html>
