<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link href="img/favicon.png" rel="icon">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor')}}/bootstrap/css/bootstrap.min.css">

    <link href="{{asset('css')}}/style.css" rel="stylesheet">
</head>
<body>
{{-- 
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

 --}}
<style>
    body {
        background: #ffd89b;
        background: -webkit-linear-gradient(to right, #ffd89b, #19547b);
        background: linear-gradient(to right, #ffd89b, #19547b);
        min-height: 100vh;
    }
    .form-control{
        border-radius: 10px;
        margin-top: 30px;
        -webkit-box-shadow: 0px 18px 98px -59px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 18px 98px -59px rgba(0,0,0,0.75);
        box-shadow: 0px 18px 98px -59px rgba(0,0,0,0.75);
    }
    .btn-block{
        border-radius: 10px;
        margin-top: 15px;
        background-color: #0360c5;
        color: white;
        font-weight: bold;
    }
    #page-content {
        flex: 1 0 auto;
    }
    .vertical-center {
      margin: 0;
      position: absolute;
      top: 50%;
      -ms-transform: translateY(-50%);
      transform: translateY(-50%);
    }
    .card{
        border-radius: 5px;
    }
</style>

<div id="page-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 vertical-center">
                <div class="container">
                    <div class="card mt-auto">
                        <div class="card-body">
                           <form method="POST" action="/esport.admin.login.panel">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h1><a href="/" class="scrollto" style="font-weight: bold;">Admin</a></h1>
                                    </div>
                                </div>
                                @if(session('message'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Woops !</strong> {{session('message')}}
                                    </div>
                                @endif
                                @if(session('message2'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Congrats!</strong> {{session('message2')}}
                                    </div>
                                @endif
                                <div class="form-group-1" style="">
                                    <input type="text" class="form-control" name="admin_username" placeholder="Type your username" required>
                                    <input type="password" class="form-control" name="password" placeholder="Type your password" required>
                                </div>
                                <div class="form-submit">
                                    <input type="submit" class="btn btn-dark mt-3 mb-5" class="btn btn-primary btn-block" value="Login" style="width: 100%;" />
                                </div>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
