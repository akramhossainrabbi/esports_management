<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reset Password</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor')}}/bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="limiter">
    <div class="container-login">
        <div class="p-l-55 p-r-55 p-t-65 p-b-54">
            <div class="text-center">
                <form method="post" action="">
                    @csrf
                    <input type="hidden" name="code" value="{{ $code }}">
                    @if(session('message'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Woops !</strong> {{session('message')}}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="email" class="control-label">E-Mail Address</label>
                        <input id="email" type="email" class="form-control" name="email" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="password" class="control-label">Password</label>
                        <input id="password" type="password" class="form-control" name="password" required>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="control-label">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Reset Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
