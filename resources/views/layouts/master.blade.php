<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="baseurl" content="{{url('/')}}">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="description" content="Jobseek - Job Board Responsive HTML Template">
		<meta name="author" content="Coffeecream Themes, info@coffeecream.eu">
		<title>Job Portal - @yield('title')</title>
		<link rel="shortcut icon" href="images/favicon.png">

		<!-- Main Stylesheet -->

		<link href="css/style.css" rel="stylesheet">



  <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
  
  <link href="runnable.css" rel="stylesheet" />
  <!-- Load jQuery and the validate plugin -->
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>

	

		<!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->

	</head>
	
	<body id="home">

		<link href="{{url('css/style.css')}}" rel="stylesheet">
	   <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
	   <link href="{{url('runnable.css')}}" rel="stylesheet" />
	   <!-- Load jQuery and the validate plugin -->
	   <script src="//code.jquery.com/jquery-1.9.1.js"></script>
	   <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>

	</head>
	<?php
	if(!isset($bodytagid)){
		$bodytagid = '';
	}
	?>
	
	<body id="{{$bodytagid}}">


		<!-- ============ PAGE LOADER START ============ -->

		<div id="loader">
			<i class="fa fa-cog fa-4x fa-spin"></i>
		</div>

		<!-- ============ PAGE LOADER END ============ -->

       <!-- ============ NAVBAR START ============ -->

		<div class="fm-container">
			<!-- Menu -->
			<div class="menu">
				<div class="button-close text-right">
					<a class="fm-button"><i class="fa fa-close fa-2x"></i></a>
				</div>
				<ul class="nav">
					<li class="active"><a href="{{url('/')}}">Home</a></li>
					<li><a href="{{url('#')}}">Jobs</a></li>
					<li><a href="{{url('#')}}">Candidates</a></li>
					<!-- <li><a href="{{url('post-a-resume')}}">Post a Resume</a></li> -->
					<li><a href="#">Read More</a>
						<ul>
							<li><a href="{{url('#')}}">Job Details</a></li>
							<li><a href="{{url('#')}}">Resume</a></li>
							<li><a href="{{url('#')}}">Company</a></li>

							<li><a href="{{url('blog')}}">Blog</a></li>
							<li><a href="{{url('#')}}">Single Post</a></li>
							<li><a href="{{url('about')}}">About Us</a></li>
							<li><a href="{{url('testimonial')}}">Testimonials</a></li>

							<!-- <li><a href="{{url('#')}}">Blog</a></li>
							<li><a href="{{url('#')}}">Single Post</a></li>
							<li><a href="{{url('#')}}">About Us</a></li>
							<li><a href="{{url('#')}}">Testimonials</a></li> -->

							<li><a href="{{url('#')}}">Options</a></li>
						</ul>
					</li>
					<li><a href="#">Job Seeker</a>
						<ul>
							<li><a class="link-register">Register</a></li>
							<li><a class="link-login">Login</a></li>
					    </ul>
					</li>
					<li><a href="#">Job Recruiter</a>
						<ul>

							<li><a class="link-recruiter-register">Register</a></li>
							<li><a class="link-recruiter-login">Login</a></li>

							<li><a href="{{url('recruiter_registration')}}">Register</a></li>
							<li><a href="{{url('recruiter_login')}}">Login</a></li>
						<?php
				           if (Auth::check() && Auth::user()->usertype == 'jobrecruiter') { ?>
							<li><a href="{{url('recruiter_logout')}}">Logout</a></li>
							<li><a href="{{url('recruiter_changepassword')}}">Change Password</a></li>
					    <?php } ?>
							<li><a href="{{url('recruiter_jobspost')}}">Job Post</a></li>

					    </ul>
					</li>
				</ul>		
			</div>
			<!-- end Menu -->
		</div>

		<!-- ============ NAVBAR END ============ -->

		

		@yield('content')

		<!-- ============ HEADER START ============ -->

		<header>
			<div id="header-background"></div>
			<div class="container">
				<div class="pull-left">
					<div id="logo"><a href="{{url('/')}}"><img src="{{url('images/logo.png')}}" alt="Jobseek - Job Board Responsive HTML Template" /></a></div>
				</div>
				<div id="menu-open" class="pull-right">
					<a class="fm-button"><i class="fa fa-bars fa-lg"></i></a>
				</div>
				<div id="searchbox" class="pull-right">
					<form>
						<div class="form-group">
							<label class="sr-only" for="searchfield">Searchbox</label>
							<input type="text" class="form-control" id="searchfield" placeholder="Type keywords and press enter">
						</div>
					</form>
				</div>
				<div id="search" class="pull-right">
					<a><i class="fa fa-search fa-lg"></i></a>
				</div>
			</div>
		</header>


       <!-- ============ CONTACT START ============ -->

		<section id="contact" class="color2">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<h2>Drop us a line</h2>
						<form role="form" name="contact-form" id="contact-form" action="process.php">
							<div class="form-group" id="contact-name-group">
								<label for="contact-name" class="sr-only">Name</label>
								<input type="text" class="form-control" id="contact-name" placeholder="Name">
							</div>
							<div class="form-group" id="contact-email-group">
								<label for="contact-email" class="sr-only">Email</label>
								<input type="email" class="form-control" id="contact-email" placeholder="Email">
							</div>
							<div class="form-group" id="contact-subject-group">
								<label for="contact-subject" class="sr-only">Subject</label>
								<input type="text" class="form-control" id="contact-subject" placeholder="Subject">
							</div>
							<div class="form-group" id="contact-message-group">
								<label for="contact-message" class="sr-only">Message</label>
								<textarea class="form-control" rows="3" id="contact-message"></textarea>
							</div>
							<button type="submit" class="btn btn-default">Submit</button>
						</form>
					</div>
					<div class="col-sm-6">
						<h2>Visit our office</h2>
						<div class="row">
							<div class="col-sm-6">
								<h5>New York</h5>
								<p>5 Park Avenue<br>
								New York, NY 10016<br>
								USA</p>
								<p><i class="fa fa-phone"></i>+1 718.242.5555<br>
								<i class="fa fa-fax"></i>+1 718.242.5556<br>
								<i class="fa fa-envelope"></i><a href="mailto:ny@jobseek.com">ny@jobseek.com</a></p>
								<p><i class="fa fa-clock-o"></i>Mon-Fri 9am - 5pm<br>
								<i class="fa fa-clock-o"></i>Sat 10am - 2pm<br>
								<i class="fa fa-clock-o"></i>Sun Closed</p>
							</div>
							<div class="col-sm-6">
								<h5>Los Angeles</h5>
								<p>8605 Santa Monica Blvd<br>
								Los Angeles, CA 90069-4109<br>
								USA</p>
								<p><i class="fa fa-phone"></i>+1 985.562.5555<br>
								<i class="fa fa-fax"></i>+1 985.562.5556<br>
								<i class="fa fa-envelope"></i><a href="mailto:la@jobseek.com">la@jobseek.com</a></p>
								<p><i class="fa fa-clock-o"></i>Mon-Fri 9am - 5pm<br>
								<i class="fa fa-clock-o"></i>Sat 10am - 2pm<br>
								<i class="fa fa-clock-o"></i>Sun Closed</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>


		<!-- ============ CONTACT END ============ -->

		<!-- ============ FOOTER START ============ -->
		<footer>
			<div id="prefooter">
				<div class="container">
					<div class="row">
						<div class="col-sm-6" id="newsletter">
							<h2>Newsletter</h2>
							<form class="form-inline">
								<div class="form-group">
									<label class="sr-only" for="newsletter-email">Email address</label>
									<input type="email" class="form-control" id="newsletter-email" placeholder="Email address">
								</div>
								<button type="submit" class="btn btn-primary">Sign up</button>
							</form>
						</div>
						<div class="col-sm-6" id="social-networks">
							<h2>Get in touch</h2>
							<a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>
							<a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>
							<a href="#"><i class="fa fa-2x fa-google-plus-square"></i></a>
							<a href="#"><i class="fa fa-2x fa-youtube-square"></i></a>
							<a href="#"><i class="fa fa-2x fa-vimeo-square"></i></a>
							<a href="#"><i class="fa fa-2x fa-pinterest-square"></i></a>
							<a href="#"><i class="fa fa-2x fa-linkedin-square"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div id="credits">
				<div class="container text-center">
					<div class="row">
						<div class="col-sm-12">
							&copy; 2015 Jobseek - Responsive Job Board HTML Template<br>
							Designed &amp; Developed by <a href="http://themeforest.net/user/Coffeecream" target="_blank">Coffeecream Themes</a>
						</div>
					</div>
				</div>
			</div>
		</footer>

		<!-- ============ FOOTER END ============ -->

		<!-- ============ JOBSEEKER LOGIN START ============ -->

		
		<div class="popup" id="login">
			<div class="popup-form">
				<div class="popup-header">
					<a class="close"><i class="fa fa-remove fa-lg"></i></a>
					<h2>Login</h2>
				</div>
				<form>
					<ul class="social-login">
						<li><a class="btn btn-facebook"><i class="fa fa-facebook"></i>Sign In with Facebook</a></li>
						<li><a class="btn btn-google"><i class="fa fa-google-plus"></i>Sign In with Google</a></li>
						<li><a class="btn btn-linkedin"><i class="fa fa-linkedin"></i>Sign In with LinkedIn</a></li>
					</ul>
					<hr>
					<div class="form-group">
						<label for="login-username">Username</label>
						<input type="text" class="form-control" id="login-username">
					</div>
					<div class="form-group">
						<label for="login-password">Password</label>
						<input type="password" class="form-control" id="login-password">
					</div>
					<button type="submit" class="btn btn-primary">Sign In</button>
				</form>
			</div>
		</div>

		<!-- ============ LOGIN END ============ -->

		<!-- ============ REGISTER START ============ -->


		<div class="popup" id="register">
			<div class="popup-form">
				<div class="popup-header">
					<a class="close"><i class="fa fa-remove fa-lg"></i></a>
					<h2>Register</h2>
				</div>
				<form>
					<ul class="social-login">
						<li><a class="btn btn-facebook"><i class="fa fa-facebook"></i>Register with Facebook</a></li>
						<li><a class="btn btn-google"><i class="fa fa-google-plus"></i>Register with Google</a></li>
						<li><a class="btn btn-linkedin"><i class="fa fa-linkedin"></i>Register with LinkedIn</a></li>
					</ul>
					<hr>
					<div class="form-group">
						<label for="register-name">Name</label>
						<input type="text" class="form-control" id="register-name">
					</div>
					<div class="form-group">
						<label for="register-surname">Surname</label>
						<input type="text" class="form-control" id="register-surname">
					</div>
					<div class="form-group">
						<label for="register-email">Email</label>
						<input type="email" class="form-control" id="register-email">
					</div>
					<hr>
					<div class="form-group">
						<label for="register-username">Username</label>
						<input type="text" class="form-control" id="register-username">
					</div>
					<div class="form-group">
						<label for="register-password1">Password</label>
						<input type="password" class="form-control" id="register-password1">
					</div>
					<div class="form-group">
						<label for="register-password2">Repeat Password</label>
						<input type="password" class="form-control" id="register-password2">
					</div>
					<button type="submit" class="btn btn-primary">Register</button>
				</form>
			</div>
		</div>
		

		<!-- ============ REGISTER END ============ -->



		<!-- ============ Job Recruiter START ============ -->


        <!-- ============ RECRUITER LOGIN START ============ -->

		<div class="popup" id="jr_login">
			<div class="popup-form">
				<div class="popup-header">
					<a class="close"><i class="fa fa-remove fa-lg"></i></a>
					<h2>Req Login</h2>
				</div>
				<form onsubmit="return jobrecruiterlogin('#jobrecruiterloginform', '#jobrecruiterloginbtn', 'recruiterlogin')" id="jobrecruiterloginform" method="post" action="{{url('recruiterlogin')}}" autocomplete="off">
                  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<ul class="social-login">
						<!-- <li><a class="btn btn-facebook"><i class="fa fa-facebook"></i>Sign In with Facebook</a></li>
						<li><a class="btn btn-google"><i class="fa fa-google-plus"></i>Sign In with Google</a></li>
						<li><a class="btn btn-linkedin"><i class="fa fa-linkedin"></i>Sign In with LinkedIn</a></li> -->
					</ul>
					<div id="recr_login_email_formgroup" class="form-group">
						<label for="login-username">Email</label>
                        <input type="email" id="email" name="email" class="form-control"/>
                        <span id="recr_login_email_helpblock" class="help-block"></span>
					</div>
					<div id="recr_login_password_formgroup" class="form-group">
					   <label for="login-password">Password</label>
                       <input type="password" id="password" name="password" class="form-control"/>
                       <span id="recr_login_password_helpblock" class="help-block"></span>
					</div>
					<!-- <a href="recruiter_dashboard"><input type="submit" name="submit" value="Submit" class="btn btn-primary"/></a> -->


 					<button type="submit" id="jobrecruiterloginbtn" class="btn btn-primary">
 						Sign In
 					</button>
 					<div class="form-group">
 						Not a member as yet? <a class="link-recruiter-register">Register Now</a>
 					</div>
 				</form>
			</div>
		</div>

		
		<!-- ============ RECRUITER REGISTER START ============ -->

		<div class="popup" id="jr_register">
			<div class="popup-form">
				<div class="popup-header">
					<a class="close"><i class="fa fa-remove fa-lg"></i></a>
					<h2>Recruiter Regi</h2>
					@include('layouts.error-notification')
				</div>
				  <form onsubmit="return jobReqRegistration('#jobReqRegistration', '#jobReqSubmitBtn', 'jobrecruiter');" id="jobReqRegistration" action="{{url('jobrecruiter')}}" method="post" autocomplete="off">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					
					
					<div id="recr_reg_fname_formgroup" class="form-group">
						<label for="register-name">First Name</label>
	                    <input type="text" id="FirstName" name="FirstName" class="form-control"/>
	                    <span id="recr_reg_fname_helpblock" class="help-block"></span>
					</div>
					<div id="recr_reg_lname_formgroup"class="form-group">
						<label for="register-surname">Last Name</label>
                        <input type="text" id="LastName" name="LastName" class="form-control"/>
                        <span id="recr_reg_lname_helpblock" class="help-block"></span>
					</div>
					<div id="recr_reg_email_formgroup" class="form-group">
						<label for="register-email">Email</label>
                    	<input type="email" id="email" name="email" class="form-control"/>
                    	<span id="recr_reg_email_helpblock" class="help-block"></span>
					</div>
					
					<div id="recr_reg_password_formgroup" class="form-group">
						<label for="register-password1">Password</label>
                        <input type="password" id="password" name="password" class="form-control"/>
                        <span id="recr_reg_password_helpblock" class="help-block"></span>
					</div>
					<div   id="recr_reg_cpassword_formgroup" class="form-group">
						<label for="register-password2">Repeat Password</label>
                        <input type="password" id="confirmpassword" name="confirmpassword" class="form-control"/>
                        <span id="recr_reg_cpassword_helpblock" class="help-block"></span>
					 </div>
					<button id="jobReqSubmitBtn" type="submit" class="btn btn-primary">Register</button>
 			  </form>
			</div>
		</div>
		
		<!-- ============ REGISTER END ============ -->

		<!-- ============ Job Recruiter end ============ -->


		<!-- Modernizr Plugin -->

		<script src="js/modernizr.custom.79639.js"></script>

		<script src="{{url('js/modernizr.custom.79639.js')}}"></script>


		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="{{url('js/jquery-1.11.2.min.js')}}"></script>

		<!-- Bootstrap Plugins -->
		<script src="{{url('js/bootstrap.min.js')}}"></script>

		<!-- Retina Plugin -->
		<script src="{{url('js/retina.min.js')}}"></script>

		<!-- ScrollReveal Plugin -->
		<script src="{{url('js/scrollReveal.min.js')}}"></script>

		<!-- Flex Menu Plugin -->
		<script src="{{url('js/jquery.flexmenu.js')}}"></script>

		<!-- Slider Plugin -->
		<script src="{{url('js/jquery.ba-cond.min.js')}}"></script>
		<script src="{{url('js/jquery.slitslider.js')}}"></script>

		<!-- Carousel Plugin -->
		<script src="{{url('js/owl.carousel.min.js')}}"></script>

		<!-- Parallax Plugin -->
		<script src="{{url('js/parallax.js')}}"></script>

		<!-- Counterup Plugin -->
		<script src="{{url('js/jquery.counterup.min.js')}}"></script>
		<script src="{{url('js/waypoints.min.js')}}"></script>

		<!-- No UI Slider Plugin -->
		<script src="{{url('js/jquery.nouislider.all.min.js')}}"></script>

		<!-- Bootstrap Wysiwyg Plugin -->

		<script src="js/bootstrap3-wysihtml5.all.min.js"></script>

		<script src="{{url('js/bootstrap3-wysihtml5.all.min.js')}}"></script>


		<!-- Flickr Plugin -->
		<script src="{{url('js/jflickrfeed.min.js')}}"></script>

		<!-- Fancybox Plugin -->
		<script src="{{url('js/fancybox.pack.js')}}"></script>

		<!-- Magic Form Processing -->
		<script src="{{url('js/magic.js')}}"></script>

		<!-- jQuery Settings -->

		<script src="js/settings.js"></script>

		<script src="{{url('js/settings.js')}}"></script>


		

		@yield('pagescript')

  
	</body>
</html>