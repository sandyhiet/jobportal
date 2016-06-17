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

		@yield('pagestyle')

		<!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->

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
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							 <input type="hidden" name="contactForm" value="3">
							<input name="siteurl" id="siteurl" type="hidden" value="{{env('SITEURL')}}">
							<div class="form-group" id="contact-name-group">
								<label for="contact-name" class="sr-only">Name</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Name">
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
							<form class="form-inline" id="newsletterSection" method="POST" action="{{url('subscribenewsletter')}}" name="form">
							  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							   <input type="hidden" name="footerSubs" value="1">
							   @if(old('footerSubs'))
								@if( Session::has('errors') )
								<li>
									<div class="alert alert-danger">
									@foreach($errors->all() as $error)
									<p>{{$error}}</p>
									@endforeach
									</div>
								</li>
								@endif
								@if( Session::has('message') )
								<li>
								<div class="alert alert-success">
								<p>{{ Session::get('message') }}</p>
								</div>
								</li>
								@endif
								@endif

								<div class="form-group">
									<label class="sr-only" for="newsletter-email">Email address</label>
									<input type="email" class="form-control"  placeholder="Email address" name="SubscriberEmail">
								</div>
								<button type="submit" class="btn btn-primary">Sign up</button>
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
                                  $so_cl_icon = '<i class="fa fa-dribbble"></i>';
                                  break;
                              case 'twitter':
                                  $so_cl_icon = '<i class="fa fa-2x fa-twitter-square"></i>';
                                  break;
                              case 'google_plus':
                                  $so_cl_icon = '<i class="fa fa-2x fa-google-plus-square"></i>';
                                  break;
                              case 'pinterest':
                                  $so_cl_icon = '<i class="fa fa-pinterest-p"></i>';
                                  break;
                              case 'youtube':
                                  $so_cl_icon = '<i class="fa fa-youtube"></i></a>';
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
					<h2>Jobseeker Login</h2>
				</div>


				<form onsubmit="return jobseekerloginValidation();" method="post" name="form7" action="{{url('jobseekerlogin')}}">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<div class="form-group">
						 @if( Session::has('errors') )
		                    <div class="alert alert-danger" style="text-align:left; padding: 11px;">
		                       @foreach($errors->all() as $error)
		                       <p style="color: red;">{{$error}}</p>
		                       @endforeach
		                     </div>
		                  @endif
		                  @if( Session::has('singleerrors') )
		                    <div class="alert alert-danger" style="padding: 11px;">
		                       <p style="color: red;">{{ Session::get('singleerrors') }}</p>
		                     </div>
		                  @endif
	                </div>
					<div class="form-group">
						<label for="login-username">Email Id</label>
						<input type="text" name="email" class="form-control" id="seeker_email">
						 <span id="req_vaildemail" class="text-danger pull-right text-xs" style="display:none;">Enter vaild email id</span>
					</div>
					<div class="form-group">
						<label for="login-password">Password</label>
						<input type="password" name="password" class="form-control" 
						id="password">
						 <span id="req_password" class="text-danger pull-right text-xs" style="display:none;">Required</span>
					</div>
					<button type="submit" class="btn btn-primary">Sign In</button>
					<div class="form-group">
						New User, <a class="link-register">Register Free</a>
					</div>
				</form>
			</div>
		</div>

		<!-- ============ LOGIN END ============ -->

		<!-- ============ REGISTER START ============ -->

		<!-- <div class="popup" id="register">
			<div class="popup-form">
				<div class="popup-header">
					<a class="close"><i class="fa fa-remove fa-lg"></i></a>
					<h2>Jobseeker Reg</h2>
					@include('layouts.error-notification')
				</div>
				<form onsubmit="return jobseekerregistration('#js_register_form', '#jobseeker_reg_submit_btn', 'jobseekerRegistartion')" id="js_register_form" action="{{url('jobseekerRegistartion')}}" method="post" autocomplete="off">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					
					<div class="form-group">
						<label for="register-name">Name</label>
						<input type="text" class="form-control"  id="firstname" name="firstname">
					</div>
					<div class="form-group">
						<label for="register-surname">Last Name</label>
						<input type="text" class="form-control" id="lastname" name="lastname">
					</div>
					<div class="form-group">
						<label for="register-email">Email</label>
						<input type="email" class="form-control" id="email" name="email">
					</div>
					
					<div class="form-group">
						<label for="register-password1">Password</label>
						<input type="password" class="form-control" id="password" 
						name="password">
					</div>
					<div class="form-group">
						<label for="register-password2">Repeat Password</label>
						<input type="password" class="form-control" id="password" 
						name="confirmpassword">
					</div>
					<button id="jobseeker_reg_submit_btn" type="submit" class="btn btn-primary">Register</button>
				</form>
			</div>
		</div> -->

		<div class="popup" id="register">
			<div class="popup-form">
				<div class="popup-header">
					<a class="close"><i class="fa fa-remove fa-lg"></i></a>
					<h2>Jobseeker Reg</h2>

					 @if( Session::has('errors') )
		                    <div class="alert alert-danger" style="text-align:left; padding: 11px;">
		                       @foreach($errors->all() as $error)
		                       <p style="color: red;">{{$error}}</p>
		                       @endforeach
		                     </div>
		                  @endif
		                  @if( Session::has('message') )
		                    <div class="alert alert-danger" style="padding: 11px;">
		                       <p style="color: red;">{{ Session::get('message') }}</p>
		                     </div>
		                  @endif
					
				</div>
				 <p id="contactus_query_frm-firstname" 
                style="margin-bottom: 0;font-size: 14px;
                color: red; display: none;"></p>
                
                <p id="contactus_query_frm-lastname" 
                style="margin-bottom: 0;font-size: 14px;
                color: red; display: none;"></p>

                <p id="contactus_query_frm-email" 
                style="margin-bottom: 0;font-size: 14px;
                color: red; display: none;"></p>
                <p id="contactus_query_frm-password" 
                style="margin-bottom: 0;font-size: 14px;
                color: red; display: none;"></p>

                <form method="post" action="{{url('jobseekerRegistartion')}}" autocomplete="off">

			
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					
					<div id="recr_reg_fname_formgroup" class="form-group">
						<label for="register-name">First Name</label>
	                    <input type="text" class="form-control"  id="firstname" name="firstname">
	                    <span id="recr_reg_fname_helpblock" class="help-block"></span>
					</div>
					<div id="recr_reg_lname_formgroup"class="form-group">
						<label for="register-surname">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname">
                        <span id="recr_reg_lname_helpblock" class="help-block"></span>
					</div>
					<div id="recr_reg_email_formgroup" class="form-group">
						<label for="register-email">Email</label>
						<input type="text" class="form-control" id="email" name="email">
                    	<span id="recr_reg_email_helpblock" class="help-block"></span>
					</div>
					
					<div id="recr_reg_password_formgroup" class="form-group">
						<label for="register-password1">Password</label>
						<input type="text" class="form-control" id="password" 
						name="password">
                        <span id="recr_reg_password_helpblock" class="help-block"></span>
					</div>
					<div   id="recr_reg_cpassword_formgroup" class="form-group">
						<label for="register-password2">Re-Password</label>
                        <input type="password" id="confirmpassword" name="confirmpassword" class="form-control"/>
                        <span id="recr_reg_cpassword_helpblock" class="help-block"></span>
					 </div>

					<button id="jobseeker_reg_submit_btn" type="submit" class="btn btn-primary">Register</button>
				</form>
			</div>
		</div>
		

		<!-- ============ REGISTER END ============ -->



		<!-- ============ Job Recruiter START ============ -->


<!-- ============ LOGIN START ============ -->

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

		
		<!-- ============ REGISTER START ============ -->

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


		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery-1.11.2.min.js"></script>

		<!-- Bootstrap Plugins -->
		<script src="js/bootstrap.min.js"></script>

		<!-- Retina Plugin -->
		<script src="js/retina.min.js"></script>

		<!-- ScrollReveal Plugin -->
		<script src="js/scrollReveal.min.js"></script>

		<!-- Flex Menu Plugin -->
		<script src="js/jquery.flexmenu.js"></script>

		<!-- Slider Plugin -->
		<script src="js/jquery.ba-cond.min.js"></script>
		<script src="js/jquery.slitslider.js"></script>

		<!-- Carousel Plugin -->
		<script src="js/owl.carousel.min.js"></script>

		<!-- Parallax Plugin -->
		<script src="js/parallax.js"></script>

		<!-- Counterup Plugin -->
		<script src="js/jquery.counterup.min.js"></script>
		<script src="js/waypoints.min.js"></script>

		<!-- No UI Slider Plugin -->
		<script src="js/jquery.nouislider.all.min.js"></script>

		<!-- Bootstrap Wysiwyg Plugin -->
		<script src="js/bootstrap3-wysihtml5.all.min.js"></script>
		<script src="js/jquery.validate-latest.js"></script>

		<!-- Flickr Plugin -->
		<script src="js/jflickrfeed.min.js"></script>

		<!-- Fancybox Plugin -->
		<script src="js/fancybox.pack.js"></script>

		<!-- Magic Form Processing -->
		<script src="js/magic.js"></script>

		<!-- jQuery Settings -->
		<script src="js/settings.js"></script>
		<script src="{{url('js/app.js')}}"></script>
		<script type="text/javascript">

			function jobseekerloginValidation(){

			    var x = document.forms["form7"]["seeker_email"].value;
			    var atpos = x.indexOf("@");
			    var dotpos = x.lastIndexOf(".");
			    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
			        //alert("Not a valid e-mail address");
			        document.getElementById("req_vaildemail").style.display='block';  
			        document.getElementById("seeker_email").focus();
			        return false;
			    }
			    else {
			      document.getElementById("req_vaildemail").style.display='none';
			    }


			    var sb=document.getElementById("password").value;
			    if(sb == '')
			    {
			    document.getElementById("req_password").style.display='block';  
			   
			    document.getElementById("password").focus();
			    return false;
			    }
			    else{
			      document.getElementById("req_password").style.display='none';
			    }
			    return true;


			}

		</script>
		



		@yield('pagescript')

	

   <?php if(old('footerSubs')){?>
    
    <script type="text/javascript">
    $(function(){
      $("html, body").animate({ scrollTop: 2500 }, 1800);
    });
    </script>
    <?php }?>
	</body>
</html>