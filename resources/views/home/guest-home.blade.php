<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Home</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
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

  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

  <!--==========================
    Header
  ============================-->

  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <h1><a href="#intro" class="scrollto">E-SPORTS BD</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
         {{-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a> --}}
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#intro">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#portfolio">News</a></li>
          <li><a href="#team">Team</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="{{ route('user.login') }}">Sign in</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->

    <section id="intro">
        <div class="intro-container">
          <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

            <ol class="carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

              <div class="carousel-item active">
                <div class="carousel-background"><img src="img/intro-carousel/1.jpg" alt=""></div>
                <div class="carousel-container">
                  <div class="carousel-content">
                    <h2>TIME TO EARN FROM YOUR SKILLS</h2>
                    <p>Level Up Your Competitive Online Gaming with Real Prizes!</p>
                    <a href="{{ route('user.registrationView') }}" class="btn-get-started">Join Now</a>
                  </div>
                </div>
              </div>

              <div class="carousel-item">
                <div class="carousel-background"><img src="img/intro-carousel/2.jpg" alt=""></div>
                <div class="carousel-container">
                  <div class="carousel-content">
                    <h2>AUTOMATED EXPERIENCE AND SIMPLE SIGNUPS</h2>
                    <p>Competing with real prizes just got easier. Never report matches or worry about making lobbies again.</p>
                    <a href="{{ route('user.registrationView') }}" class="btn-get-started">Join Now</a>
                  </div>
                </div>
              </div>

              <div class="carousel-item">
                <div class="carousel-background"><img src="img/intro-carousel/3.jpg" alt=""></div>
                <div class="carousel-container">
                  <div class="carousel-content">
                    <h2>FREE TO ENTER DAILY TOURNAMENTS</h2>
                    <p>Never miss the chance to compete. 100% free to enter tournaments. Seriously...</p>
                    <a href="{{ route('user.registrationView') }}" class="btn-get-started">Join Now</a>
                  </div>
                </div>
              </div>

              <div class="carousel-item">
                <div class="carousel-background"><img src="img/intro-carousel/4.jpg" alt=""></div>
                <div class="carousel-container">
                  <div class="carousel-content">
                    <h2>EARN REAL REWARDS AND GET PAID. QUICK!</h2>
                    <p>Thousands of Taka Already Paid To Players, Quickly. Over Tk.100,000 Earnings Distributed.</p>
                    <a href="{{ route('user.registrationView') }}" class="btn-get-started">Join Now</a>
                  </div>
                </div>
              </div>

              <div class="carousel-item">
                <div class="carousel-background"><img src="img/intro-carousel/5.jpg" alt=""></div>
                <div class="carousel-container">
                  <div class="carousel-content">
                    <h2>QUICK AND SAFE WITHDRAWALS</h2>
                    <p>Thousands of players have won and claimed prizes. Your hard earned winnings are only a few clicks away.</p>
                    <a href="{{ route('user.registrationView') }}" class="btn-get-started">Join Now</a>
                  </div>
                </div>
              </div>

            </div>

            <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
              <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>

          </div>
        </div>
    </section><!-- #intro -->

  <main id="main">

    <!--==========================
      Featured Services Section
    ============================-->
    <section id="featured-services">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 box">
            <i class="ion-ios-bookmarks-outline"></i>
            <h4 class="title"><a>COMPETE</a></h4>
            <p class="description">Signup, Connect Steam and Compete Against Players of All Skills.</p>
          </div>

          <div class="col-lg-4 box box-bg">
            <i class="ion-ios-stopwatch-outline"></i>
            <h4 class="title"><a>WIN</a></h4>
            <p class="description">Solo or With a Team. A Win is a Win.</p>
          </div>

          <div class="col-lg-4 box">
            <i class="ion-ios-heart-outline"></i>
            <h4 class="title"><a>EARN</a></h4>
            <p class="description">Get Paid for Your Skill. Quickly.</p>
          </div>

        </div>
      </div>
    </section><!-- #featured-services -->

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>BUILT TO EMPOWER COMPETITIVE GAMERS</h3>
          <p>We believe each gamer should have the ability to become better while being rewarded for their skill. That is why we are changing the esports industry and giving everybody a chance to go pro.</p>
        </header>

        <div class="row about-cols">

          <div class="col-md-4 wow fadeInUp">
            <div class="about-col">
              <div class="img">
                <img src="img/about-mission.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
              </div>
              <h2 class="title"><a>Our Mission</a></h2>
              <p>
                Our mission is to promote electronic sports as true sports, and become the global body in charge of maintaining, promoting and supporting it..
              </p>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
            <div class="about-col">
              <div class="img">
                <img src="img/about-plan.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-list-outline"></i></div>
              </div>
              <h2 class="title"><a>Our Plan</a></h2>
              <p>
                Increase the number of member nations, Create regulations and standards for international esports, Train referees through the human resources program, Host an international esports world championship.
              </p>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
            <div class="about-col">
              <div class="img">
                <img src="img/about-vision.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-eye-outline"></i></div>
              </div>
              <h2 class="title"><a>Our Vision</a></h2>
              <p>
                Our vision is to be an instantly recognized community with the talent, infrastructure, and investment that drives the success of esports businesses.
              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #about -->

    <!--==========================
      About Esport Section
    ============================-->
    <section id="services">
      <div class="container">

        <header class="section-header wow fadeInUp">
          <h3>What is Esports?</h3>
          <div class="row">
              <div class="col-md-6">
                <img src="img/controller.png" alt="" class="img-fluid center">
              </div>
              <div class="col-md-6 all-p">
                <p> If you’ve been to a conference recently, you’ve probably heard that as a question in an Esports 101 panel.</p>

                <p>Simply put, esports is the professional video game playing industry.</p>

                <p>The part often overlooked is that last word; industry.</p>

                <p>Esports has grown to become far more than some kids playing video games. The last 30 years of competitive gaming has matured into a $1B+ per year juggernaut that is watched and played by people across the globe. Video games, like sports, bring people together and involve a heck of a lot more than just the players. Teams, leagues, venues, sponsors, hotels, apparel, you name it… the entire whirlwind of organized entertainment swirls around this incredible industry made up of genuine gamers.</p>

                <p>Just like kids go out to play physical sports competitively, gaming has become a competitive pastime. The professional level aspirations are now parallel, and the field of talent is made up of millions of casual video game players. The fresh business opportunities that surround esports have been plentiful; and there’s still a long way to go. We’re glad to be part of keeping it all organized, and humbled that it still needs to be explained. That’s esports.</p>

                <p>Want to learn more about the esports industry? Our association can give you the in-depth research and data you’re looking for. Just reach out.</p>
              </div>
          </div>
        </header>
      </div>
    </section><!-- #about esport -->


    <!--==========================
      Facts Section
    ============================-->
    <section id="facts"  class="wow fadeIn">
      <div class="container">

        <header class="section-header">
          <h3>IT'S FINALLY TIME TO EARN FROM YOUR SKILLS</h3>
          <p>It's time to earn money by playing your favorite games!</p>
        </header>

        <div class="row counters">

            <div class="col-lg-3 col-6 text-center">
                <span data-toggle="counter-up">2447</span>
                <p>Total Players</p>
            </div>

            <div class="col-lg-3 col-6 text-center">
                <span data-toggle="counter-up">421</span>
                <p>Played Matches</p>
            </div>

            <div class="col-lg-3 col-6 text-center">
                <span data-toggle="counter-up">111364</span>
                <p>Total earned</p>
            </div>

            <div class="col-lg-3 col-6 text-center">
                <span data-toggle="counter-up">18</span>
                <p>Upcoming Matches</p>
            </div>
            </div>

        <div class="facts-img">
          <img src="img/facts-img.png" alt="" class="img-fluid">
        </div>

      </div>
    </section><!-- #facts -->

    <!--==========================
      Portfolio Section
    ============================-->
    <section id="portfolio"  class="section-bg" >
      <div class="container">

        <header class="section-header">
          <h3 class="section-title">Esport news</h3>
        </header>


        <div class="row portfolio-container">

          @foreach($newses as $news)
            <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
              <div class="portfolio-wrap">
                <figure>
                  <img src="{{ asset('images') }}/news/{{$news->news_feed_image}}" class="img-fluid" alt="">
                  <a href="{{ asset('images') }}/news/{{$news->news_feed_image}}" data-lightbox="portfolio" data-title="App 1" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                  <a href="{{$news->news_feed_link}}" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                </figure>

                <div class="portfolio-info">
                  <h4><a>{{$news->news_feed_header}}</a></h4>
                  <p>{{$news->news_feed_sub_header}}</p>
                </div>
              </div>
          </div>
          @endforeach

        </div>

      </div>
    </section><!-- #portfolio -->

    <!--==========================
      Team Section
    ============================-->
    <section id="team">
      <div class="container">
        <div class="section-header wow fadeInUp">
          <h3>Team</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6 wow fadeInUp">
            <div class="member">
              <img src="img/team-1.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Akram Hossain</h4>
                  <span>Chief Executive Officer</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="member">
              <img src="img/team-3.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Mehedi Hasan Khan</h4>
                  <span>Chief Technology Officer</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="member">
              <img src="img/team-4.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Riad Ahmed</h4>
                  <span>Chief Financial Officer</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #team -->

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h3>Contact Us</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Address</h3>
              <address>A108 Adam Street, NY 535022, USA</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+155895548855">+1 5589 55488 55</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">info@example.com</a></p>
            </div>
          </div>

        </div>

        <div class="form">
          <div id="sendmessage" style="display: none; color: green;"></div>
          <div id="errormessage"></div>
          <form role="form" class="contactForm">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="contact_name" class="form-control" id="contact_name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="contact_email" id="contact_email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="contact_subject" id="contact_subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="contact_messege" id="contact_messege" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button type="submit" class="submit-messege">Send Message</button></div>
          </form>
        </div>

      </div>
    </section><!-- #contact -->

  </main>

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
              <li><i class="ion-ios-arrow-right"></i> <a href="{{ route('guest.services') }}">Services</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="{{ route('guest.terms') }}">Terms of service</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="{{ route('guest.privacy') }}">Privacy policy</a></li>
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
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
        -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- comment below if you don't want to use a preloader -->
  <div id="preloader"></div>

  <!-- JavaScript Libraries -->
  <script src="{{asset('lib')}}/jquery/jquery.min.js"></script>
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
      $('.submit-messege').click(function(){
        $contact_name = $('#contact_name').val();
        $contact_email = $('#contact_email').val();
        $contact_subject = $('#contact_subject').val();
        $contact_messege = $('#contact_messege').val();

        if($contact_name != '' & $contact_email != '' & $contact_subject != '' & $contact_messege != ''){
              $.ajax({
                type : 'POST',
                url : '{{ route('guest.contact') }}',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:{'contact_name':$contact_name, 'contact_email':$contact_email, 'contact_subject':$contact_subject, 'contact_messege':$contact_messege,},
                success:function(result){
                    $('#sendmessage').show();
                    $('#sendmessage').html(result.success);
                    $("#contact_name, #contact_email, #contact_subject, #contact_messege").val("");
                },
            });
          }
      });
  });
</script>
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
