<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reset Password</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor')}}/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
</head>
<body>
<style>
    .vertical-center {
        margin: 0;
        position: absolute;
        top: 50%;
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }
</style>

    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2 vertical-center">
                <h1>Forgot Password</h1>
                <form method="POST" action="/password-reminder">
                    @csrf
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        @if(session('message'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Woops !</strong> {{session('message')}}
                            </div>
                        @endif
                        @if(session('message1'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{session('message1')}}
                            </div>
                        @endif
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Password Reset Code</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
