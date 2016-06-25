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
		<link href="{{url('css/style.css')}}" rel="stylesheet">
	   <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
	  

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
							<li><a href="{{url('recruiter_registration')}}">Register</a></li>
							<li><a href="{{url('recruiter_login')}}">Login</a></li>
							<li><a href="{{url('recruiter_logout')}}">Logout</a></li>
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
	                   @include('layout.error-notification')
						<form  action="{{url('saveFeedback')}}" method="post" id="register_form9">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							<input type="hidden" name="contact_form" value="3">
							<!-- <input name="siteurl" id="siteurl" type="hidden" value="{{env('SITEURL')}}"> -->
							<div id="contact-name-group" class="form-group">
								<label for="contact-name" class="sr-only">Name</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Name">	
							</div>
							<div id="contact-email-group" class="form-group">
								<label for="contact-email" class="sr-only">Email</label>
								<input type="email" class="form-control" id="email" name="email" placeholder="Email">	
							</div>
							<div  id="contact-subject-group" class="form-group">
							<label for="contact-subject" class="sr-only">Subject</label>
							<input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">	
							</div>
							<div  id="contact-message-group" class="form-group" >
								<label for="contact-message" class="sr-only">Message</label>
								<textarea class="form-control" rows="3" id="feedback" name="feedback"></textarea>
							</div>
							<button  class="btn btn-default" id="contact_us_send_now">Submit</button>
							 <span class="output_message"></span>
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
								<p>{{$contact_usa[0]->Location}}<br>
								New York, NY 10016<br>
								USA</p>
								<p><i class="fa fa-phone"></i>{{$contact_usa[$key]->PhoneNumber1}}<br>
								<i class="fa fa-fax"></i>{{$contact_usa[$key]->PhoneNumber2}}<br>
								<i class="fa fa-envelope"></i><a href="mailto:ny@jobseek.com">{{$contact_usa[$key]->Email}}</a></p>
								<p><i class="fa fa-clock-o"></i>Mon-Fri 9am - 5pm<br>
								<i class="fa fa-clock-o"></i>Sat 10am - 2pm<br>
								<i class="fa fa-clock-o"></i>Sun Closed</p>
								<?php } ?>
							</div>
							<div class="col-sm-6">
								<h5>Los Angeles</h5>
								<p>{{$contact_uk[$key]->Location}}</p>
								<p><i class="fa fa-phone"></i>{{$contact_uk[$key]->PhoneNumber1}}<br>
								<i class="fa fa-fax"></i>{{$contact_uk[$key]->PhoneNumber2}}<br>
								<i class="fa fa-envelope"></i><a href="mailto:la@jobseek.com">{{$contact_usa[$key]->Email}}</a></p>
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
						   @if(old('newsletter'))
		                  @if( Session::has('errors') )
		                  <li>
		                    <div class="alert alert-danger">
		                      @foreach($errors->all() as $error)
		                      <p style="float: none;color: red;padding: 0;margin: 0;">{{$error}}</p>
		                      @endforeach
		                    </div>
		                  </li>

		                  @endif

		                  @if( Session::has('message') )

		                  <li>
		                    <div class="alert alert-success">
		                      
		                      <p style="float: none;color: green;padding: 0;margin: 0;">{{ Session::get('message') }}</p>
		                      
		                    </div>
		                  </li>

		                  @endif

		                  @endif
							<form class="form-inline" method="POST" action="{{url('subscribenewsletter')}}" id="newsletter_form">
								<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							      <input name="siteurl" id="siteurl" type="hidden" value="{{env('SITEURL')}}">
								 <input type="hidden" name="newsletter" value="7">
								<div class="form-group">
									<label class="sr-only" for="newsletter-email">Email address</label>
									<input type="email" class="form-control" id="newsletter-email" placeholder="Email address"  name="SubscriberEmail">
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
			var submit_contactus_query_form = function(){
	
				var extension = $(".selected-dial-code").html();
				
				$('#extention').val(extension);

				$('#contactus_query_frm-feedback').html('').hide();
				$('#contactus_query_frm-subject').html('').hide();
				$('#contactus_query_frm-email').html('').hide();
				$('#contactus_query_frm-name').html('').hide();

				var prevhtml = $('#contactus_query_form_btn_submit').html();
				$('#contactus_query_form_btn_submit').attr('disabled', 'disabled');
				$('#contactus_query_form_btn_submit').html('<img src="images/ui-anim_basic_16x16.gif">');


				var data = $('#contactus_query_form').serializeArray();
				alert(data);
				$.ajax({
					url:baseurl+'/post_contactus_query_from',
					type:'post',
					data:data,
					success:function(res){
						//alert(res);
						console.log(res);
						$('#contactus_query_form_btn_submit').removeAttr('disabled');
						$('#contactus_query_form_btn_submit').html(prevhtml);
						if(res == '1'){
							document.getElementById('contactus_query_form').reset();
							$('#contactus_query_frm-message').html('Thank you for your query.').show();
						} else {
							if(res.email[0]){
								$('#contactus_query_frm-email').html(res.email[0]).show();
							} 
							if(res.feedback[0]){
								$('#contactus_query_frm-feedback').html(res.feedback[0]).show();
							} 
							if(res.name[0]){
								$('#contactus_query_frm-name').html(res.name[0]).show();
							}
						}
						return false;
					},
					error:function(xhr,status,error){
						alert("Status: " + status);
			            alert("Error: " + error);
			            alert("xhr: " + xhr.readyState);
			            $('#contactus_query_form_btn_submit').removeAttr('disabled');
						$('#contactus_query_form_btn_submit').html(prevhtml);
			            document.getElementById('contactus_query_form').reset();
			            return false;
					}
				});
			
				return false;
			}
			/*contact us forn validation*/
			  $(function() {
			  
			    // Setup form validation on the #register-form element
			    $("#register_form9").validate({
			    
			     
			        rules: {
			            name: "required",
			            email: "required",
			            subject:"required",
			            feedback:"required",
			          
			            
			        },
			        
			        // Specify the validation error messages
			        messages: {
			            name: "<font color='red'>Please enter your Name</font>",
			            email: "<font color='red'>Please enter your Email</font>",
			             subject: "<font color='red'>Please Enter Subject</font>",
			            feedback: "<font color='red'>Please Write Feedback</font>",
			        
			        },
			        
			        submitHandler: function(form) {
			            form.submit();
			        }
			    });

			  });
		  

		</script>

		<script type="text/javascript">


		  /*contact us forn validation*/
			  $(function() {
			  
			    // Setup form validation on the #register-form element
			    $("#newsletter_form").validate({
			    
			        rules: {
			            
			            email: "required",
			                
			        },
			        
			        // Specify the validation error messages
			        messages: {
			            email: "<font color='red'>Please enter your Email</font>",
			            
			        },
			        
			        submitHandler: function(form) {
			            form.submit();
			        }
			    });

			  });
		</script>

		<link href="runnable.css" rel="stylesheet" />
		<!-- Load jQuery and the validate plugin -->
		<script src="//code.jquery.com/jquery-1.9.1.js"></script>
		<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
		
		 <?php if(old('contact_form')){?>
    
    <script type="text/javascript">
    $(function(){
      $("html, body").animate({ scrollTop: 2500 }, 1800);
    });
    </script>
    <?php }?>


    <?php if(old('newsletter')){?>
    <script type="text/javascript">
    $(function(){
      $("html, body").animate({ scrollTop: 2500 }, 1800);
    });
    </script>
    <?php }?>


	  @yield('pagescript')

	 </body>
  </html>