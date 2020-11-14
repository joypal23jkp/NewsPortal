<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>NewsPortal-Admin :: @yield('title') </title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,600i,700,900&display=swap" rel="stylesheet">
{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">--}}


    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
</head>
<body class="d-flex">
<div id="app" class="d-flex">
    <header>
        <div class="vue-sidebar">
            <div class="title d-flex">
                <h5>Newspaper</h5>
                <h4>N</h4>
            </div>
            <div class="navigation-items">
                <ul class="list-group mt-5 ml-3">
                    @if(Route::current()->getName()=='admin.dashboard')
                        <li class="list-group-item border-0 text-left" style="font-size: 16px; font-weight: bold;">
                            <a href="{{ route('admin.dashboard') }}"> <i class="ion-md-flower px-2 active"></i>
                                Dashboard
                                <i class="fa fa-arrow-right" aria-hidden="true"  style="color: gray;"></i>
                            </a>
                        </li>
                    @else
                        <li class="list-group-item border-0 text-left"  >
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="ion-md-flower px-2 active"></i>
                                Dashboard
                            </a>
                        </li>
                    @endif

                    @if(Route::current()->getName()=='admin-all-news')
                        <li class="list-group-item border-0 text-left" style="font-size: 16px; font-weight: bold;">
                            <a href="{{ route('admin-all-news') }}">
                                <i class="ion-md-wallet px-2"></i> News
                                <i class="fa fa-arrow-right" aria-hidden="true"  style="color: gray;"></i>
                            </a>
                        </li>
                    @else
                        <li class="list-group-item border-0 text-left" >
                            <a href="{{ route('admin-all-news') }}">
                                <i class="ion-md-flower px-2 active"></i>
                                News
                            </a>
                        </li>
                    @endif


                    @if(Route::current()->getName()=='admin-all-users')
                        <li class="list-group-item border-0 text-left" style="font-size: 16px; font-weight: bold;">
                            <a href="{{ route('admin-all-users') }}">
                                <i class="ion-md-wallet px-2"></i> Users
                                <i class="fa fa-arrow-right" aria-hidden="true"  style="color: gray;"></i>
                            </a>
                        </li>
                    @else
                        <li class="list-group-item border-0 text-left" >
                            <a href="{{ route('admin-all-users') }}">
                                <i class="ion-md-flower px-2 active"></i>
                                Users
                            </a>
                        </li>
                    @endif

                    @if(Route::current()->getName()=='admin.profile.add-news.form')
                        <li class="list-group-item border-0 text-left"  style="font-size: 16px; font-weight: bold;">
                            <a href="{{ route('admin.profile.add-news.form') }}">
                                <i class="ion-md-add px-2"></i>
                                AddNews
                                <i class="fa fa-arrow-right" aria-hidden="true"  style="color: gray;"></i>
                            </a>
                        </li>
                     @else
                        <li class="list-group-item border-0 text-left" >
                            <a href="{{ route('admin.profile.add-news.form') }}">
                                <i class="ion-md-add px-2 active"></i>
                                AddNews
                            </a>
                        </li>
                    @endif

                    <li class="list-group-item border-0 text-left">
                        <a href="{{ route('admin.logout') }}"  onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            <i class="ion-md-log-out px-2"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>

                </ul>
            </div>
            <div class="user-profile w-100">

                @if(Auth::guard('admin')->user()->img_url != null)
                <a href="{{ route('admin.profile') }}"><img src="{{ asset(Auth::guard('admin')->user()->img_url ) }}"  class="rounded-circle" id="user_profile_image" alt=""></a>
                    @else
{{--                    <a href="{{ route('admin.profile') }}"><img src="{{  }}"  class="rounded-circle" id="user_profile_image" alt=""></a>--}}

                @endif
            </div>
            <ul class="social-icon-helper d-flex justify-content-between mx-3 my-2" style="padding-left: 0;">
                <li class="list-group-item border-0 text-center" id="social_icon_list"><a href="https://www.facebook.com/kamol.paul.3760"><i class="fa fa-facebook px-2 social-icon"></i></a></li>
                <li class="list-group-item border-0 text-center" id="social_icon_list1"><i class="fa fa-instagram px-2 social-icon"></i></li>
                <li class="list-group-item border-0 text-center" id="social_icon_list2"><i class="fa fa-linkedin px-2 social-icon"></i></li>
            </ul>
            <hr>


        </div>
    </header>

</div>
<div class="w-100">
    <div class="dashboard-wrapper">
        @yield('content')
        <div>

        </div>
    </div>
    @if(Route::current()->getName() == 'admin.dashboard')
        <canvas id="pieChart" style="height: 40vh; width: 100%; padding: 20px;"></canvas>

        <script>


            let httpx = new XMLHttpRequest();
            httpx.onreadystatechange = function () {
              if (this.readyState === 4 && this.status === 200)  {
                  document.getElementById('demo').innerHTML = this.responseText;
              }
            };
            httpx.open("GET", 'http://localhost:8000/api/admin/all/user' , true);
            httpx.send();

            var ctx = document.getElementById('pieChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>
        @else
    @endif
</div>
</body>
</html>
