<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link href="img/favicon.png" rel="icon">
    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('fonts')}}/material-icon/css/material-design-iconic-font.min.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor')}}/bootstrap/css/bootstrap.min.css">

    <link href="{{asset('css')}}/style.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>


</head>
<body>
<style>
    body{
        background-color: black;
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
                           <form method="POST" action="/login">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h1><a href="/" class="scrollto" style="font-weight: bold;">ESPORTS BD</a></h1>
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
                                    <input  type="text" class="form-control" name="user_username" placeholder="Type your email or username" required/>
                                    <input type="password" class="form-control" name="password" placeholder="Type your password" required/>
                                </div>
                                <div class="text-right p-t-8 p-b-31 mt-2">
                                    <a href="{{route('password-reminder')}}">
                                        Forgot password?
                                    </a>
                                </div>
                                <div class="form-submit">
                                    <input type="submit" class="btn btn-dark mt-1" class="btn btn-primary btn-block" value="Login" style="width: 100%;" />
                                </div>
                                <div class="text-center mt-2">
                                    <p>New User? <a href="{{route('user.registrationView')}}">Sign Up</a></p>
                                </div>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('vendor')}}/bootstrap/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</body><!-- This templates was made by Akram Hossain -->
</html>