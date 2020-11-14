<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>

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
<div class="container login-wrapper">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card login-card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.login') }}">
                        @csrf

                        <div class="form-group row">
                            <label class="col-2"></label>
                            <div class="col-md-8 justify-content-center">

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter You Email.">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label class="col-2"></label>
                        </div>

                        <div class="form-group row">
                            <label class="col-2"></label>
                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter You Password.">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label class="col-2"></label>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <label class="col-2"></label>
                            <div class="col-md-8 ">
                                <button type="submit" class="btn btn-block login-button">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('admin.password.request'))
                                    <a class="btn btn-link" href="{{ route('admin.password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                            <label class="col-2"></label>
                        </div>
                    </form>


                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('admin.register') }}" class="register-part text-white">Register !</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<style>
   .login-card{
        height: 75vh; width: 75%; margin-top: 50px; box-shadow: gray 2px 5px 50px;
   }
    .card-header{
        background: #ff6565;
        color: white;
    }
    .card-body{
        padding-top: 100px;
    }
    .login-button{
        background: #ff6565;
        color: white;
        transition: .5s;
    }
    .login-button:hover{
        border-radius: 40px;
        background-image: linear-gradient(to right, #ffd8d5, #ffa2a8, #ff5260, #801822);
        box-shadow: #e3e3e3 10px 10px 10px;
        font: bold;
    }
    .card-footer{
        background: #ff6565;
        color: white;
    }
    .register-part:hover{
        font-size: 18px;
    }
</style>
</html>
