<!DOCTYPE html>
<html lang="en">
<head>
    <title>Error</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor')}}/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/main.css">
</head>
<body>

<div class="limiter">
    <div class="container-login">
        <div class="p-l-55 p-r-55 p-t-65 p-b-54">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Oops</h5>
                    <p class="card-text">Oops! Your code is not valid anymore. Generate new token for reset password.</p>
                    <a href="{{route('password-reminder')}}" class="btn btn-primary">Send Link</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
