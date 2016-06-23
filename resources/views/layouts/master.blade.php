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
							<li><a href="{{url('#')}}">Blog</a></li>
							<li><a href="{{url('#')}}">Single Post</a></li>
							<li><a href="{{url('#')}}">About Us</a></li>
							<li><a href="{{url('#')}}">Testimonials</a></li>
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
					<div id="logo"><a href="{{url('/')}}"><img src="images/logo.png" alt="Jobseek - Job Board Responsive HTML Template" /></a></div>
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

						 @if(old('contactForm'))

                        @if( Session::has('errors') )

                          <div class="alert alert-danger">
                             @foreach($errors->all() as $error)
                             <p style="color: red;">{{$error}}</p>
                             @endforeach
                           </div>
                         
                        @endif

                        @if( Session::has('message') )
                        
                           <div class="alert alert-success" style="">
                            <p>{{ Session::get('message') }}</p>
                             </div>
                     
                        @endif

                    @endif

						<form  action="{{url('saveFeedback')}}" method="post">
						  <form method="post"  onsubmit="return submit_contactus_query_form();" id="contactus_query_form" >
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							 <input type="hidden" name="contactForm" value="3">
							<input name="siteurl" id="siteurl" type="hidden" value="{{env('SITEURL')}}">
							<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}" id="contact-name-group">
								<label for="contact-name" class="sr-only">Name</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Name">
								@if ($errors->has('name'))
			                  <span class="help-block">
			                   <strong>{{ $errors->first('name') }}</strong>
			                  </span>
			                  @endif
							</div>
							<div class="form-group" id="contact-email-group">
								<label for="contact-email" class="sr-only">Email</label>
								<input type="email" class="form-control" id="email" name="email" placeholder="Email">
							</div>
							<div class="form-group" id="contact-subject-group">
								<label for="contact-subject" class="sr-only">Subject</label>
								<input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
							</div>
							<div class="form-group" id="contact-message-group">
								<label for="contact-message" class="sr-only">Message</label>
								<textarea class="form-control" rows="3" id="feedback" name="feedback"></textarea>
							</div>
							<button  class="btn btn-default" id="contact_us_send_now">Submit</button>
							 <!-- <span class="output_message"></span> -->
						</form>
						  
					</div>
					<div class="col-sm-6">
						<h2>Visit our office</h2>
						<div class="row">
							<div class="col-sm-6">
								<?php 
								foreach ($contact_usa as $key => $value) {
									
								?>
								<h5>New York</h5>
								<p>{{$contact_usa[$key]->Location}}</p>
								<p><i class="fa fa-phone"></i>{{$contact_usa[$key]->PhoneNumber1}}<br>
								<i class="fa fa-fax"></i>{{$contact_usa[$key]->PhoneNumber2}}<br>
								<i class="fa fa-envelope"></i><a href="mailto:ny@jobseek.com">{{$contact_usa[$key]->Email}}</a></p>
								<p><i class="fa fa-clock-o"></i>Mon-Fri 9am - 5pm<br>
								<i class="fa fa-clock-o"></i>Sat 10am - 2pm<br>
								<i class="fa fa-clock-o"></i>Sun Closed</p>
								<?php } ?>
							</div>
							<div class="col-sm-6">
								<?php 
								foreach ($contact_uk as $key => $value) {
								?>
								<h5>Los Angeles</h5>
								<p>{{$contact_uk[$key]->Location}}</p>
								<p><i class="fa fa-phone"></i>{{$contact_uk[$key]->PhoneNumber1}}<br>
								<i class="fa fa-fax"></i>{{$contact_uk[$key]->PhoneNumber2}}<br>
								<i class="fa fa-envelope"></i><a href="mailto:la@jobseek.com">{{$contact_usa[$key]->Email}}</a></p>
								<p><i class="fa fa-clock-o"></i>Mon-Fri 9am - 5pm<br>
								<i class="fa fa-clock-o"></i>Sat 10am - 2pm<br>
								<i class="fa fa-clock-o"></i>Sun Closed</p>
								<?php } ?>
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
							 <!-- @include('layout.error-notification') -->
							<form  onsubmit=" return newsletter_form('#newsletter_form', '#newsletter_submit_btn', 'subscribenewsletter')" class="form-inline" id="newsletter_form" method="POST" action="{{url('subscribenewsletter')}}">
								 <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
								 <input type="hidden" name="footerSubs" value="1">

								 <div class="form-group" id="newsletter_formgroup">
									<label class="sr-only" for="newsletter-email">Email address</label>
									<input type="email" class="form-control" placeholder="Email address" name="SubscriberEmail" id="newsletter_formcontrol"
									<?php echo ($errors->has('SubscriberEmail'))?'':'';?> >

								</div>
								<button  type="submit" class="btn btn-primary" id=="newsletter_submit_btn">Sign up</button>
								@if ($errors->has('SubscriberEmail'))
								<div class="text-danger">{{ $errors->first('SubscriberEmail') }}</div>
								@endif
							</form>
					         
						</div>

						<div class="col-sm-6" id="social-networks">
						<h2>Get in touch</h2>
						 <?php if(sizeof($social_links)>0){ ?>
               
                      <?php 
                      $so_cl_icon = '';
                      foreach($social_links as $key=>$val){
                          switch ($social_links[$key]->social_network) {
                              case 'dribbble':
                                  $so_cl_icon = '<i class="fa fa-2x fa-dribbble-square"></i>';
                                  break;
                              case 'twitter':
                                  $so_cl_icon = '<i class="fa fa-2x fa-twitter-square"></i>';
                                  break;
                              case 'google_plus':
                                  $so_cl_icon = '<i class="fa fa-2x fa-google-plus-square"></i>';
                                  break;
                              case 'pinterest':
                                  $so_cl_icon = '<i class="fa fa-2x fa-pinterest-square"></i>';
                                  break;
                              case 'youtube':
                                  $so_cl_icon = '<i class="fa fa-2x fa-youtube-square"></i></a>';
                                  break;
                              case 'flickr':
                                  $so_cl_icon = '<i class="fa fa-flickr"></i>';
                                  break;
                              default:
                                  $so_cl_icon = '<i class="fa fa-2x fa-facebook-square"></i>';
                                  break;
                          }
                      ?>
                      @if($social_links[$key]->link)
                     <a target="_blank" href="{{$social_links[$key]->link}}">{!!$so_cl_icon!!}</a>
                      @endif
                      <?php }?>
                
                  <?php }?>
							<!-- <a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>
							<a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>
							<a href="#"><i class="fa fa-2x fa-google-plus-square"></i></a>
							<a href="#"><i class="fa fa-2x fa-youtube-square"></i></a>
							<a href="#"><i class="fa fa-2x fa-vimeo-square"></i></a>
							<a href="#"><i class="fa fa-2x fa-pinterest-square"></i></a>
							<a href="#"><i class="fa fa-2x fa-linkedin-square"></i></a> -->
						</div>
					</div>
				</div>
			</div>
			<div id="credits">
				<div class="container text-center">
					<div class="row">
						<div class="col-sm-12">
							&copy; <?php echo date("Y");?> Job Portal<br>
							Designed &amp; Developed by <a href="http://intactinnovations.com/" target="_blank">Intact Innovations Technologies Pvt Ltd</a>
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
		<script src="{{url('js/bootstrap3-wysihtml5.all.min.js')}}"></script>

		<!-- Flickr Plugin -->
		<script src="{{url('js/jflickrfeed.min.js')}}"></script>

		<!-- Fancybox Plugin -->
		<script src="{{url('js/fancybox.pack.js')}}"></script>

		<!-- Magic Form Processing -->
		<script src="{{url('js/magic.js')}}"></script>

		<!-- jQuery Settings -->
		<script src="{{url('js/settings.js')}}"></script>

		<script type="text/javascript">


	/*//////////newsletter/////////////////*/


	  var newsletter_form = function(formid, submitbtnid, url){
		var submitbtnhtml = $(submitbtnid).html();
		$(submitbtnid).html('<img src="images/ui-anim_basic_16x16.gif">');
		$(submitbtnid).attr('disabled', 'disabled');
		$('#newsletter_formgroup').removeClass();
		$('#newsletter_formcontrol').html('');


		var data = $(formid).serializeArray();
		// alert(data);
		// alert("Not a valid e-mail address");
		$.ajax({
			type:'post',
			data:data,
			url:url,
			success:function(result){
				// alert(result);
				
				$(submitbtnid).removeAttr('disabled');
				$(submitbtnid).html(submitbtnhtml);
				if(result == '0'){
					alert('Register successfully');
					location.reload();
				} else {
					if(result.SubscriberEmail[0]){

						$('#newsletter_formgroup').addClass('has-error');
						$('#newsletter_formcontrol').html(result.SubscriberEmail[0]);
					}  
					
					
			  }
			}
		});
		return false;
	  }


			</script>


		@yield('pagescript')

  
	</body>
</html>