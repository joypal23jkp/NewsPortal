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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card login-card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.verify.submit') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Enter Verification Code') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code" autofocus/>
                                <input id="email" type="text" class="form-control"   name="email" value="{{ $email }}"/>

                                @error('code')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <label class="col-md-2"></label>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-block registration-button">
                                    {{ __('submit') }}
                                </button>
                            </div>
                            <label class="col-md-2"></label>
                        </div>
                    </form>
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
    .registration-button{
        background: #ff6565;
        color: white;
        transition: .5s;
    }
    .registration-button:hover{
        border-radius: 40px;
        background-image: linear-gradient(to right, #ffd8d5, #ffa2a8, #ff5260, #801822);
        box-shadow: #e3e3e3 10px 10px 10px;
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
