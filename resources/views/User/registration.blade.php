<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

    <link href="img/favicon.png" rel="icon">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor')}}/bootstrap/css/bootstrap.min.css">

    <link href="{{asset('css')}}/style.css" rel="stylesheet">
</head>
<body>
<style>
    body{
        background-color: black;
    }
    .form-control{
        border-radius: 10px;
        margin-top: 20px;
        -webkit-box-shadow: 0px 18px 98px -59px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 18px 98px -59px rgba(0,0,0,0.75);
        box-shadow: 0px 18px 98px -59px rgba(0,0,0,0.75);
    }
    .btn-block{
        border-radius: 10px;
        margin-top: 20px;
        background-color: #0360c5;
        color: white;
        font-weight: bold;
    }
    #page-content {
        flex: 1 0 auto;
    }
    .circle-img {
        border-radius: 50%;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        -o-border-radius: 50%;
        height: 160px;
        width: 160px;
    }
    .inputfile {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }
    .inputfile + .label {
        font-size: 1.25em;
        font-weight: 700;
        color: white;
        background-color: black;
        display: inline-block;
    }

    .inputfile:focus + .label,
    .inputfile + .label:hover {
        background-color: red;
    }
    .btn-primary{
        background-color: black;
    }
    .btn-primary:hover{
        background-color: black;
        cursor: pointer;
    }
</style>



<div id="page-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="container">
                    <form method="POST" action="register" class="appointment-form" id="user_form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mt-3 text-center">
                                <img class="circle-img" id="blah" src="images/user_image/placeholder.png" alt="your image" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-3 text-center">
                                <label class="btn btn-dark" style="width: 30%; cursor: pointer;">
                                            Upload<input class="inputfile" name="image" type='file' id="imgInp" style="width: 0px;height: 0px;overflow: hidden;"/>
                                </label>
                            </div>
                        </div>
                        <div class="form-group-1">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control" name="first_name" id="title" placeholder="First Name" required />
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="last_name" id="name" placeholder="Last Name" required />
                                </div>
                            </div>
                            <input type="username" class="form-control" name="username" id="username" placeholder="User Name" required />
                            <span id="user_error"></span>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required />
                            <span id="email_error"></span>
                            <input type="number" class="form-control" name="mobile" id="mobile" placeholder="Mobile Number" required />
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required />
                            <input type="password" class="form-control" name="confirm_password"  id="confirm_password" placeholder="Confirm Password" required />
                        </div>
                        <div class="form-submit">
                            <input type="submit" class="btn btn-block" name="submit" id="buttonsave" class="btn btn-primary btn-block" value="SIGN UP" />
                        </div>
                        <div class="text-center mt-1">
                            <p style="color: white;">Already a User? <a href="{{route('user.login')}}">Login Here</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js')}}/ajax.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#email').blur(function(){
            var email_error = '';
            var email = $('#email').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{ route('user.emailCheck') }}",
                method:"GET",
                data:{email:email, _token:_token},
                success:function(result)
                {
                    if(result == 'Not Unique')
                    {
                        $('#email_error').html('');
                        $('#email').removeClass('has-error');
                        $('#buttonsave').attr('disabled', false);
                    }
                    else
                    {
                        $('#email_error').html('<label class="text-danger">There is an account with this email.</label>');
                        $('#email').addClass('has-error');
                        $('#buttonsave').attr('disabled', 'disabled');
                    }
                }
            })

        });

    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#username').blur(function(){
            var user_error = '';
            var user_name = $('#username').val();
            var _token = $('input[name="_token"]').val();
            var filter = /^[A-Z a-z][A-Z a-z 0-9]*$/;
            if(!filter.test(user_name))
            {
                $('#user_error').html('<label class="text-danger">Invalid Username</label>');
                $('#username').addClass('has-error');
                $('#buttonsave').attr('disabled', 'disabled');
            }
            else
            {
                $.ajax({
                    url:"{{ route('user.usernameCheck') }}",
                    method:"GET",
                    data:{user_name:user_name, _token:_token},
                    success:function(result)
                    {
                        if(result == 'Not Unique')
                        {
                            $('#user_error').html('');
                            $('#username').removeClass('has-error');
                            $('#buttonsave').attr('disabled', false);
                        }
                        else
                        {
                            $('#user_error').html('<label class="text-danger">This username is already taken.</label>');
                            $('#username').addClass('has-error');
                            $('#buttonsave').attr('disabled', 'disabled');
                        }
                    }
                })
            }
        });

    });
</script>
<script>
    var password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password");

    function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>
<script>
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
          $('#blah').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#imgInp").change(function() {
    readURL(this);
});
</script>
</body><!-- This templates was made by Akram Hossain -->
</html>
