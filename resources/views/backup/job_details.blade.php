@extends('layout.master')
@section('title', 'Home Page')
@section('content')


		 <!-- ============ NAVBAR START ============ -->

		<div class="fm-container">
			<!-- Menu -->
			<div class="menu">
				<div class="button-close text-right">
					<a class="fm-button"><i class="fa fa-close fa-2x"></i></a>
				</div>
				<ul class="nav">
					<li class="active"><a href="{{url('/')}}">Home</a></li>
					<li><a href="{{url('jobs')}}">Jobs</a></li>
					<li><a href="{{url('post-a-job')}}">Post a job</a></li>
					<li><a href="{{url('candidates')}}">Candidates</a></li>
					<li><a href="{{url('post-a-resume')}}">Post a Resume</a></li>
					<li><a href="#">Read More</a>
						<ul>
							<li><a href="{{url('job-details')}}">Job Details</a></li>
							<li><a href="{{url('resume')}}">Resume</a></li>
							<li><a href="{{url('company')}}">Company</a></li>
							<li><a href="{{url('blog')}}">Blog</a></li>
							<li><a href="{{url('post')}}">Single Post</a></li>
							<li><a href="{{url('about')}}">About Us</a></li>
							<li><a href="{{url('testimonials')}}">Testimonials</a></li>
							<li><a href="{{url('options')}}">Options</a></li>
						</ul>
					</li>
					<li><a href="">Job Seeker</a>
						<ul>
							<li><a class="link-register">Register</a></li>
							<li><a class="link-login">Login</a></li>
					    </ul>
					</li>
					<li><a href="">Job Recruiter</a>
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
		<!-- ============ TITLE START ============ -->

		<section id="title">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<h1>Senior Back End Developer</h1>
						<h4>
							<span><i class="fa fa-map-marker"></i>Chicago</span>
							<span><i class="fa fa-clock-o"></i>Full time</span>
							<span><i class="fa fa-dollar"></i>50,000-75,000</span>
						</h4>
					</div>
				</div>
			</div>
		</section>

		<!-- ============ TITLE END ============ -->

		<!-- ============ CONTENT START ============ -->


		  <section class="kode_people_bgs" style="margin-top: -20px;">
          <div class="container">
              <div class="row">
                <div class="col-lg-12">@include('layout.error-notification')</div>
                <div class="col-lg-8">
                  <!-- Job details -->
                  <div class="col-lg-12">
                    <h4>JOB DETAILS</h4>
                    <p style="text-align:justify"><strong>DESCRIPTION:</strong>
                    {!!$jobdetail[0]->jobDescription!!}</p>
                    <p style="text-transform: uppercase;">JOB CATEGORY: {{$jobdetail[0]->jobCategory}} </p>
                    <br>
                    <p style="text-align:justify"><strong>REQUIREMENTS:</strong></p>

                    <?php
                    $job_requirments = DB::table('job_requirment')->where('job_id', '=', $jobdetail[0]->id)->get();
                    foreach($job_requirments as $key=>$val){
                    ?>
                    
                    <p style="text-transform: uppercase;"><strong><i class="fa fa-star"></i> </strong>{{ucfirst($val->requirment)}}</p>
                    <?php }?>
                    
                    <br>
                    <p style="text-align:justify"><strong>BENEFITS:</strong></p>
                    <?php
                    $job_benefits = DB::table('job_benefits')->where('job_id', '=', $jobdetail[0]->id)->get();
                    foreach($job_benefits as $key=>$val){
                    ?>
                    <p style="text-transform: uppercase;"><strong><i class="fa fa-star"></i> </strong>{{ucfirst($val->benefits)}}</p>
                    <?php }?>
                    
                    
                    <br>
                    <p style="text-align:justify;text-transform: uppercase;"><strong>contact details:</strong></p>
                    <?php
                    $jobcontactperson = DB::table('jobcontactperson')->where('JobId', '=', $jobdetail[0]->id)->get();
                    foreach($jobcontactperson as $key=>$val){
                    ?>
                    <p style="text-transform: uppercase;"><strong><i class="fa fa-user"></i> </strong> {{ucfirst($val->ContactPersonName)}} </p>
                    <p><strong><i class="fa fa-envelope"></i> </strong>  {{ucfirst($val->ContactEmail)}} - <strong><i class="fa fa-link"></i> </strong> {{ucfirst($val->weburl)}} - <strong><i class="fa fa-phone-square"></i> </strong> {{ucfirst($val->ContactPhone)}}</p>
                    
                    
                    <?php }?>
                    
                    
                    
                  </div>
                  
                  <!-- <div class="kode_press_link">
                     <a href="{{ url('jobseekerLogin') }}" class="kode_link_2 pull-center">Apply</a>
                     <a href="javascript:void(0);" class="kode_link_2 pull-left">Apply</a>
                  </div> -->
                </div>
                <div class="col-lg-4">
                  <div class="kode_aside_event kode_aside">
                    <?php 
                    if(Auth::check() && Auth::user()->usertype == 'jobseeker'){
                      $is_applied = DB::table('jobapplications')->where('JobId', '=', $jobdetail[0]->id)->where('CandidateId', '=', Auth::user()->id)->count();
                    ?>
                    <h5>Apply Now</h5>
                    <ul>
                      <li>
                          <?php if($is_applied == 0){?>
                          <div class="kode_press_link">
                              <a class="kode_link_2 pull-center" href="{{url('job_apply/'.$jobdetail[0]->id)}}">
                                Apply
                              </a>
                          </div>
                          <?php } else {?>
                          <div class="kode_press_link">
                              <a class="kode_link_2 pull-center" href="javascript:void(0);">
                                <i class="fa fa-thumbs-up"></i> Applied 
                              </a>
                          </div>
                          <?php }?>
                      </li>
                    </ul>
                    
                    <?php } else {?>
                    <h5>Login to Apply</h5>
                    {!! Form::open(array('url'=>'validJobseekersLogin','method'=>'post','id'=>'jobseekerform','class'=>'',"onsubmit"=>"return postformvalidation('.validateJobseekers');")) !!}
                      <input type="hidden" name="JobId" value="{{$jobdetail[0]->id}}">

                      <div class="col-lg-12" style="padding-top:20px;">
                          
                          <div class="form-group">
                            <lable id="err-email" class="text-danger pull-right text-xs formValidationErrMsg" style="display:none;margin: 0;font-size: 11px;color: red;"></lable>
                            <input type="email" validationType="iipl_required email" errMessageId="#err-email" class="form-control validateJobseekers" id="" name="username" value="{{old('username')}}" placeholder="Email (User ID)" style="border: 1px solid #e5e6e9;">
                          </div>

                          <div class="form-group">
                            <lable id="erruserpass" class="text-danger pull-right text-xs formValidationErrMsg" style="display:none;margin: 0;font-size: 11px;color: red;"></lable>
                            <input class="form-control validateJobseekers" id="" validationType = "iipl_required" errMessageId="#erruserpass" type="password" name="userpass" placeholder="Password" style="border: 1px solid #e5e6e9;">
                          </div>

                          <div class="checkbox">
                            <label><input type="checkbox" name="remember" value="1"> Remember</label>
                          </div>
                          
                          <button type="submit" class="btn btn-default">Login and Apply</button>

                          <p>
                          <a style="float:left; font-size: 11px; font-weight: bold; color:#666;" href="{{url('resume_post')}}">Jobseeker Signup</a>
                          <a style="float:right; font-size: 11px; font-weight: bold; color:#666;" href="{{url('forget_password')}}">Forget Password?</a>
                          </p>

                      </div>
                      
                      

                      
                    </form>
                    <?php }?>
                  </div>
                  <div class="kode_aside_event kode_aside">
                    <h5>ABOUT THIS COMPANY</h5>
                    <?php if($jobdetail[0]->logo){ ?>
                    

                    <p align="center" style="margin: 0;padding:10px;">
                        <img src="{{url('companysLogo/'.$jobdetail[0]->logo)}}" style="width:70%;">
                    </p>
                    <hr>
                    
                    <?php } else {?>

                    <p style="text-transform: capitalize; text-align: center;line-height: 40px;margin: 0px; padding: 0;"><strong>{{$jobdetail[0]->companyName}}</strong></p>
                    <p style="text-align: center;margin-top: -15px;"><small >{{$jobdetail[0]->tagline}}</small></p>
                    <hr>

                    <?php } ?>
                    
                    
                    <div class="col-lg-12">
                      <p style="text-align:justify"><strong>DESCRIPTION:</strong> <div class="comp_desc">{!!$jobdetail[0]->companyDescription!!}</div></p>
                      <p><strong><i class="fa fa-link"></i></strong> {{$jobdetail[0]->website}}</p>
                      <p><strong><i class="fa fa-google-plus"></i></strong> {{$jobdetail[0]->googleUserName}} <strong><i class="fa fa-linkedin"></i></strong> {{$jobdetail[0]->linkedInUserName}} <strong><i class="fa fa-twitter"></i></strong> {{$jobdetail[0]->twitterUserName}}</p>
                      
                    </div>
                    
                  </div>
                </div>
           

            </div>
         </div>
      </section>

		<!-- <section id="jobs">
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<article>
							<h2>Job Details</h2>
							<p>Maecenas mollis dictum lectus quis scelerisque. Nulla at rutrum ipsum. Praesent augue quam, facilisis vitae felis vel, convallis convallis nisi. Donec maximus accumsan purus vel tempus. Aenean pretium luctus velit id fermentum. Aenean non velit non nulla interdum venenatis. Integer in libero sagittis, consequat est quis, commodo odio. Aliquam eu vulputate neque. Nunc et massa leo. Vestibulum a pretium dolor. Proin et fermentum sapien. Cras malesuada neque ac purus fermentum, a placerat quam malesuada. Quisque sollicitudin tellus a ex eleifend mattis. In vitae ipsum in mauris vestibulum imperdiet.</p>
							<p>Maecenas mollis dictum lectus quis scelerisque. Nulla at rutrum ipsum. Praesent augue quam, facilisis vitae felis vel, convallis convallis nisi. Donec maximus accumsan purus vel tempus. Aenean pretium luctus velit id fermentum. Aenean non velit non nulla interdum venenatis. Integer in libero sagittis, consequat est quis, commodo odio. Aliquam eu vulputate neque. Nunc et massa leo. Vestibulum a pretium dolor. Proin et fermentum sapien. Cras malesuada neque ac purus fermentum, a placerat quam malesuada. Quisque sollicitudin tellus a ex eleifend mattis. In vitae ipsum in mauris vestibulum imperdiet.</p>
							<h3>Requirements</h3>
							<ul>
								<li>Aliquam rhoncus justo eget tellus scelerisque, at mollis mi aliquam.</li>
								<li>Quisque pretium convallis pulvinar.</li>
								<li>Nulla rutrum nisi mi, iaculis commodo nibh lobortis sed.</li>
								<li>Sed pulvinar, nunc vitae molestie dapibus, lacus dolor dignissim sapien.</li>
								<li>Pellentesque ipsum ex, imperdiet quis consequat sed, consectetur ut ante.</li>
								<li>Aliquam libero felis, mollis vitae elementum vel, bibendum eu tortor.</li>
								<li>Morbi rhoncus luctus interdum.</li>
							</ul>
							<h3>Benefits</h3>
							<ul>
								<li>Aliquam rhoncus justo eget tellus scelerisque, at mollis mi aliquam.</li>
								<li>Quisque pretium convallis pulvinar.</li>
								<li>Nulla rutrum nisi mi, iaculis commodo nibh lobortis sed.</li>
								<li>Sed pulvinar, nunc vitae molestie dapibus, lacus dolor dignissim sapien.</li>
								<li>Pellentesque ipsum ex, imperdiet quis consequat sed, consectetur ut ante.</li>
								<li>Aliquam libero felis, mollis vitae elementum vel, bibendum eu tortor.</li>
								<li>Morbi rhoncus luctus interdum.</li>
							</ul>
							<h3>How to apply</h3>
							<p>Vivamus pulvinar <a href="mailto:hr@netvibes.com">hr@netvibes.com</a> lobortis placerat. Cras non est nibh. In a quam id justo aliquam elementum. In cursus urna ac sem tincidunt aliquet. Vivamus a aliquet purus, luctus tincidunt orci.</p>
							<p>
								<a href="#" class="btn btn-primary btn-lg">Apply Here</a>
								&nbsp;
								<a href="#" class="btn btn-default btn-lg">Apply via LinkedIn</a>
							</p>
						</article>
					</div>
					<div class="col-sm-4" id="sidebar">
						<div class="sidebar-widget" id="share">
							<h2>Share this job</h2>
							<ul>
								<li><a href="https://www.facebook.com/sharer/sharer.php?u=http://www.coffeecreamthemes.com/themes/jobseek/site/job-details.html"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/home?status=http://www.coffeecreamthemes.com/themes/jobseek/site/job-details.html"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://plus.google.com/share?url=http://www.coffeecreamthemes.com/themes/jobseek/site/job-details.html"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=http://www.coffeecreamthemes.com/themes/jobseek/site/job-details.html&amp;title=Jobseek%20-%20Job%20Board%20Responsive%20HTML%20Template&amp;summary=&amp;source="><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div>
						<hr>
						<div class="sidebar-widget" id="company">
							<h2>About this company</h2>
							<p><img src="http://placehold.it/300x109.gif" alt="" class="img-responsive"></p>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque tristique euismod lorem, a consequat orci consequat a. Donec ullamcorper tincidunt nunc, ut aliquam est pellentesque porta. In neque erat, malesuada sit amet orci ac, laoreet laoreet mauris.</p>
							<p><a href="company.html" class="btn btn-primary">Read more</a></p>
						</div>
						<hr>
						<div class="sidebar-widget" id="company-jobs">
							<h2>More jobs from this company</h2>
							<ul>
								<li><a href="#">Senior Web Designer</a></li>
								<li><a href="#">Junior System Administrator</a></li>
								<li><a href="#">Key Account Manager</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section> -->

		<!-- ============ CONTENT END ============ -->

		
@endsection