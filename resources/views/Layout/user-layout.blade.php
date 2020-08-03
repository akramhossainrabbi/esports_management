<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{asset('lib')}}/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{asset('lib')}}/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="{{asset('lib')}}/animate/animate.min.css" rel="stylesheet">
  <link href="{{asset('lib')}}/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="{{asset('lib')}}/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="{{asset('lib')}}/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{asset('css')}}/style.css" rel="stylesheet">

  <script src="{{asset('lib')}}/jquery/jquery.min.js"></script>

  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <h1><a href="{{route('user.userHomeView')}}" class="scrollto">E-SPORTS BD</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
         {{-- <a href="{{route('user.userHomeView')}}"><img src="img/logo.png" alt="" title="" /></a> --}}
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="{{route('user.userHomeView')}}">Game</a></li>
          <li><a href="{{route('user.profileView')}}">Profile</a></li>
          <li class="menu-has-children"><a style="color: white">Results</a>
            <ul>
              <li><a href="{{route('user.resultView', 1)}}">Pubg</a></li>
              <li><a href="{{route('user.resultView', 2)}}">FreeFire</a></li>
              <li><a href="{{route('user.resultView', 3)}}">Call of Duty</a></li>
            </ul>
          </li>
          {{-- <li><a href="#contact">Contact</a></li> --}}
          <li><a href="{{route('user.logout')}}">Logout</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
   <div id="page-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 page-height">
                    @yield('container')
                </div>
            </div>
        </div>
    </div>
  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>Home</h3>
            <p>Being built on entertainment, we have developed a solid network from Twitter to Youtube and Twitch to keep our greatest asset – our players – fully visible and happy to engage with the fans and community at large.</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Home</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">About us</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Services</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Marketing Permissions — Esports Insider will use the information you provide on this form to send you regular information about the latest happenings in the esport industry, via the twice weekly ESI Dispatch and occasionally for marketing purposes.</p>
            <form method="post" id="email_form">
              <input type="email" name="email" id="subscribe"><input type="button" id="subscribed_submit"  value="Subscribe">
            </form>
            <div class="errorTxt" style="color: red;"></div>
            <div id="subcribed_messege" style="display: none; color: green;"></div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>E-SPORTS BD</strong>. All Rights Reserved
      </div>
{{--       <div class="credits">
        Designed by <a href="">CoderFoxBD</a>
      </div> --}}
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- comment below if you don't want to use a preloader -->
  <div id="preloader"></div>

  <!-- JavaScript Libraries -->
  <script src="{{asset('lib')}}/jquery/jquery-migrate.min.js"></script>
    <script src="{{asset('lib')}}/jquery/jquery.validate.min.js"></script>
  <script src="{{asset('lib')}}/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('lib')}}/easing/easing.min.js"></script>
  <script src="{{asset('lib')}}/superfish/hoverIntent.js"></script>
  <script src="{{asset('lib')}}/superfish/superfish.min.js"></script>
  <script src="{{asset('lib')}}/wow/wow.min.js"></script>
  <script src="{{asset('lib')}}/waypoints/waypoints.min.js"></script>
  <script src="{{asset('lib')}}/counterup/counterup.min.js"></script>
  <script src="{{asset('lib')}}/owlcarousel/owl.carousel.min.js"></script>
  <script src="{{asset('lib')}}/isotope/isotope.pkgd.min.js"></script>
  <script src="{{asset('lib')}}/lightbox/js/lightbox.min.js"></script>
  <script src="{{asset('lib')}}/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="{{asset('contactform')}}/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="{{asset('js')}}/main.js"></script>

</body>
<script type="text/javascript">
  $(document).ready(function() {
    $('#subscribed_submit').click(function(){
        $("#email_form").validate({
         rules: {
           email: {
              required: true,
              email: true
            }
         },
         messages: {
          email: {
              required: "Please provide an email!",
              email: "Please provide a valid email!"
           }
         },
         errorElement : 'div',
         errorLabelContainer: '.errorTxt'
      });
      $subscribed_email = $('#subscribe').val();

      if($("#email_form").valid()){
            $.ajax({
              type : 'POST',
              url : '{{ route('user.subscribe') }}',
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              data:{'subscribed_email':$subscribed_email},
              success:function(result){
                  $('#subcribed_messege').show();
                  $('#subcribed_messege').html(result.success);
                  $("#subscribe").val("");
              },
          });
        }
    });
  });
</script>
</html>
