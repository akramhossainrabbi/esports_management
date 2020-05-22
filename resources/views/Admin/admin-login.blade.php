<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/p_kvQ_icon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor')}}/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('fonts')}}/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('fonts')}}/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor')}}/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor')}}/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor')}}/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor')}}/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor')}}/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/util.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login" style="background-color: #49d8ef;">
        <div class="wrap-login p-l-55 p-r-55 p-t-65 p-b-54">
            <form class="login-form validate-form" method="POST" action="/esport.admin.login.panel">
                @csrf
                <span class="login-form-title p-b-49">
						Admin Login
					</span>
                @if(session('message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Woops !</strong> {{session('message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="wrap-input validate-input m-b-23" data-validate = "Username is reauired">
                    <span class="label-input100">Username</span>
                    <input class="input" type="text" name="admin_username" placeholder="Type your username" required>
                    <span class="focus-input" data-symbol="&#xf206;"></span>
                </div>

                <div class="wrap-input validate-input" data-validate="Password is required">
                    <span class="label-input">Password</span>
                    <input class="input" type="password" name="password" placeholder="Type your password" required>
                    <span class="focus-input" data-symbol="&#xf190;"></span>
                </div>

                <div class="text-right p-t-8 p-b-31">
                    <a href="#">
                        Forgot password?
                    </a>
                </div>

                <div class="container-login-form-btn">
                    <div class="wrap-login-form-btn">
                        <button class="login-form-btn">
                            Login
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!--===============================================================================================-->
<script src="{{asset('vendor')}}/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="{{asset('vendor')}}/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="{{asset('vendor')}}/bootstrap/js/popper.js"></script>
<script src="{{asset('vendor')}}/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="{{asset('vendor')}}/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="{{asset('vendor')}}/daterangepicker/moment.min.js"></script>
<script src="{{asset('vendor')}}/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="{{asset('vendor')}}/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="{{asset('js')}}/main.js"></script>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</body>
</html>
