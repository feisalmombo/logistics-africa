<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Logistics Africa | Login</title>

<!-- Favicon icon -->
<link rel="icon" type="image/png" sizes="16x16" href="#">
<!-- Favicon icon -->


<link href="{{asset('temp/logintemp/css/style.css')}}" rel="stylesheet">

<style>
    .move-left {
    width: auto;
    }
</style>
</head>

<body class="h-100">
<div id="preloader">
<div class="loader">
<svg class="circular" viewBox="25 25 50 50">
<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
</svg>
</div>
</div>




<div class="login-form-bg h-100">
<div class="container h-100">
<div class="row justify-content-center h-100">
<div class="col-xl-6">
    <div class="form-input-content">
        <div class="card login-form mb-0">
            <div class="card-body pt-5">
            <a class="text-center" href="{{url('/')}}"> <h4><strong style="color:#2B3483">Logistics Africa</strong><strong style="color:#E58225">.</strong></h4></a>
            @include('msgs.success')

                <form class="mt-5 mb-5 login-input" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                    </div>

                    <button type="submit" class="btn login-form__btn submit w-100" style="background-color:#C64343;">
                        SIGN IN
                    </button>
                    <br>
                    <br>

                    <div class="form-group">
                        <a href="{{ route('password.request') }}" class="pull-right cat__core__link--blue cat__core__link--underlined" style="text-decoration: none;color:black">Forgot Password?</a>
                        <div class="checkbox" style="color: black">
                            <label>
                                <input type="checkbox" style="color: black;" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember me') }}
                                </label>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>




<!--**********************************
Scripts
***********************************-->
<script src="{{asset('temp/logintemp/plugins/common/common.min.js')}}"></script>
<script src="{{asset('temp/logintemp/js/custom.min.js')}}"></script>
<script src="{{asset('temp/logintemp/js/settings.js')}}"></script>
<script src="{{asset('temp/logintemp/js/gleek.js')}}"></script>
<script src="{{asset('temp/logintemp/js/styleSwitcher.js')}}"></script>
</body>
</html>





