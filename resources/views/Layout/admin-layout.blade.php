<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('css')}}/notification.css">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor')}}/bootstrap/css/bootstrap.min.css">
    <link href="{{asset('lib')}}/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css')}}/admin.css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @yield('css')
<!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{asset('vendor')}}/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    @yield('js')
    <title>@yield('title')</title>
</head>
<body class="d-flex flex-column">
<style>
    body {
        background: #ffd89b;
        background: -webkit-linear-gradient(to right, #ffd89b, #19547b);
        background: linear-gradient(to right, #ffd89b, #19547b);
        min-height: 100vh;
    }
    nav{
        text-transform: uppercase;
    }
    @media (max-width: 992px) {
            .navbar-collapse {
                position: absolute;
                top: 54px;
                right: 100%;
                padding-left: 15px;
                padding-right: 15px;
                padding-bottom: 15px;
                width: 100%;
                transition: all 0.3s ease;
                display: block;
            }
            .navbar-collapse.collapsing {
                height: auto !important;
                margin-right: 50%;
                transition: all 0.3s ease;
                display: block;
            }
            .navbar-collapse.show {
                right: 0;
            }
        }
        .dropdown-menu{
            background-color: #343a40;
        }
        .navbar-dark .navbar-nav .active>.nav-link, .navbar-dark .navbar-nav .nav-link.active, .navbar-dark .navbar-nav .nav-link.show, .navbar-dark .navbar-nav .show>.nav-link {
            color: rgba(255,255,255,.5);
        }
        .navbar-dark .navbar-nav .active>.nav-link, .navbar-dark .navbar-nav .nav-link.active, .navbar-dark .navbar-nav .nav-link.show, .navbar-dark .navbar-nav .show>.nav-link:hover {
            color: #fff;
        }
        .notification {
          background-color: transparent;
          color: white;
          text-decoration: none;
          padding: 4px 8px;
          position: relative;
          display: inline-block;
          border-radius: 2px;
        }

        .notification .badge {
          position: absolute;
          top: -10px;
          right: -10px;
          padding: 6px 9px;
          border-radius: 50%;
          background: red;
          color: white;
        }
</style>




<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="{{route('admin.home')}}">Esports BD Admin</a>
    <div class="collapse navbar-collapse bg-dark" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="{{route('admin.home')}}" class="nav-link">Add Game</a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.gameList')}}" class="nav-link">Game List</a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.matchView')}}" class="nav-link">Add Match</a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.matchList')}}" class="nav-link">Match List</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  More
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a href="{{route('admin.matchPlayerSearchView')}}" class="nav-link">Player Joined</a>
                  <a href="{{route('admin.userSearchView')}}" class="nav-link">Search User</a>
                  <a href="{{route('admin.userList')}}" class="nav-link">User List</a>
                  <a href="{{route('admin.addnews')}}" class="nav-link">Add News</a>
                  <a href="{{ route('admin.liability') }}" class="nav-link">Liabilites</a>
                  <a href="{{route('admin.adminLogout')}}" class="nav-link">Logout</a>
                </div>
            </li>
        </ul>
    </div>
    <a href="{{route('admin.notificationView')}}" class="notification pull-right">
        <i class="fa fa-bell" style="font-size: 26px;"></i>
        <div class="badge" id="notif_num"></div>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
</nav>


<div id="page-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                @yield('container')
            </div>
        </div>
    </div>
</div>

</body>
<script type="text/javascript">
  $(document).ready(function() {
    $.ajax({
          type : 'get',
          url : '{{ route('admin.notify') }}',
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success:function(result){
            console.log(result.success);
              $('#notif_num').html(result.success);
          },
      });
  });
</script>
</html>
