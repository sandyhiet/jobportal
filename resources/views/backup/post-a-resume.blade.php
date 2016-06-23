@extends('layout.master')
@section('title', 'Home Page')
@section('content')



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

		 <!-- ============ NAVBAR START ============ -->

		<div class="fm-container">
			<!-- Menu -->
			<div class="menu">
				<div class="button-close text-right">
					<a class="fm-button"><i class="fa fa-close fa-2x"></i></a>
				</div>
				<ul class="nav">
					<li class="active"><a href="#">My profile</a>
						<ul>
							<li><a href="{{url('logout')}}">Logout</a></li>
						</ul>
					</li>
					<li><a href="{{url('jobs')}}">Jobs</a></li>
					<li><a href="{{url('post-a-resume')}}">Post a Resume</a></li>
					<li><a href="{{url('blog')}}">Blog</a></li>
					<!-- <li><a href="#">Read More</a>
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
					</li> -->
					<!-- <li><a href="">Job Seeker</a>
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
					</li> -->
				</ul>		
			</div>
			<!-- end Menu -->
		</div>

		<!-- ============ NAVBAR END ============ -->

		<!-- ============ HEADER START ============ -->

		<header>
			<div id="header-background"></div>
			<div class="container">
				<div class="pull-left">
					<div id="logo"><a href="index.html"><img src="images/logo.png" alt="Jobseek - Job Board Responsive HTML Template" /></a></div>
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

		<!-- ============ HEADER END ============ -->

		<!-- ============ RESUME START ============ -->

		<section id="resume">
			<div class="container">
				<div class="row text-center">
					<div class="col-sm-12">
						<h1>Post a Resume</h1>
						<h4>Find your perfect job</h4>
						<div class="jumbotron">
							<h3>Have an account?</h3>
							<p>If you don’t have an account you can create one below by entering your email address/username.<br>
							A password will be automatically emailed to you.</p>
							<p><a href="#" class="btn btn-primary">Sign In</a></p>
						</div>
					</div>
				</div>

				<form>

					<!-- Resume Details Start -->
					<div class="row">
						<div class="col-sm-6">
							<h2>Resume details</h2>
						</div>
						<div class="col-sm-6 text-right">
							<a class="btn btn-primary"><i class="fa fa-linkedin-square"></i> LinkedIn Import</a>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group" id="resume-name-group">
								<label for="resume-name">Name</label>
								<input type="text" class="form-control" id="resume-name" placeholder="e.g. John Doe">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group" id="resume-photo-group">
								<label for="resume-photo">Photo (Optional)</label>
								<input type="file" id="resume-photo">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group" id="resume-title-group">
								<label for="resume-title">Title</label>
								<input type="text" class="form-control" id="resume-title" placeholder="e.g. Web Designer">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group" id="resume-video-group">
								<label for="resume-video">Video (Optional)</label>
								<input type="text" class="form-control" id="resume-video" placeholder="Video URL">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group" id="resume-email-group">
								<label for="resume-email">Email</label>
								<input type="email" class="form-control" id="resume-email" placeholder="you@yourdomain.com">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group" id="resume-category-group">
								<label for="resume-category">Job Category</label>
								<select  class="form-control" id="resume-category">
									<option>Choose a category</option>
									<option>Internet Services</option>
									<option>Banking</option>
									<option>Financial</option>
									<option>Marketing</option>
									<option>Management</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group" id="resume-location-group">
								<label for="resume-location">Location</label>
								<input type="text" class="form-control" id="resume-location" placeholder="e.g. New York City">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group" id="resume-skills-group">
								<label for="resume-skills">Skills</label>
								<input type="text" class="form-control" id="resume-skills" placeholder="e.g. Photoshop, HTML, CSS">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group" id="resume-content-group">
								<label for="resume-content">Resume Content</label>
								<div class="textarea form-control" id="resume-content"></div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<hr class="dashed">
						</div>
					</div>
					<div class="row social-network">
						<div class="col-sm-6">
							<div class="form-group" id="resume-social-network-group">
								<label for="resume-social-network">Choose Social Network</label>
								<select  class="form-control" id="resume-social-network">
									<option>Choose social network</option>
									<option>Facebook</option>
									<option>Twitter</option>
									<option>Google+</option>
									<option>LinkedIn</option>
									<option>YouTube</option>
									<option>Vimeo</option>
									<option>Github</option>
									<option>Flickr</option>
									<option>YouTube</option>
									<option>DeviantArt</option>
									<option>ThemeForest</option>
									<option>CodeCanyon</option>
									<option>VideoHive</option>
									<option>AudioJungle</option>
									<option>GraphicRiver</option>
									<option>PhotoDune</option>
									<option>3dOcean</option>
									<option>ActiveDen</option>
									<option>Other</option>
								</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group" id="resume-social-network-url-group">
								<label for="resume-social-network-url">URL</label>
								<input type="text" class="form-control" id="resume-social-network-url" placeholder="http://">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<hr class="dashed">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<p><a id="add-social-network">+ Add Social Network</a></p>
							<hr>
						</div>
					</div>
					<!-- Resume Details End -->

					<!-- Experience Start -->
					<div class="row">
						<div class="col-sm-12">
							<p>&nbsp;</p>
							<h2>Experience</h2>
						</div>
					</div>
					<div class="row experience">
						<div class="col-sm-6">
							<div class="form-group" id="resume-employer-group">
								<label for="resume-employer">Employer</label>
								<input type="text" class="form-control" id="resume-employer" placeholder="Company name">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group" id="resume-experience-dates-group">
								<label for="resume-experience-dates">Start/End Date</label>
								<input type="text" class="form-control" id="resume-experience-dates" placeholder="e.g. April 2010 - June 2013">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group" id="resume-job-title-group">
								<label for="resume-job-title">Job Title</label>
								<input type="text" class="form-control" id="resume-job-title" placeholder="e.g. Web Designer">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group" id="resume-responsibilities-group">
								<label for="resume-responsibilities">Responsibilities (Optional)</label>
								<input type="text" class="form-control" id="resume-responsibilities" placeholder="e.g. Developing new websites">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<hr class="dashed">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<p><a id="add-experience">+ Add Experience</a></p>
							<hr>
						</div>
					</div>
					<!-- Experience Start -->

					<!-- Education Start -->
					<div class="row">
						<div class="col-sm-12">
							<p>&nbsp;</p>
							<h2>Education</h2>
						</div>
					</div>
					<div class="row education">
						<div class="col-sm-6">
							<div class="form-group" id="resume-school-group">
								<label for="resume-school">School Name</label>
								<input type="text" class="form-control" id="resume-school" placeholder="School name, city and country">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group" id="resume-education-dates-group">
								<label for="resume-education-dates">Start/End Date</label>
								<input type="text" class="form-control" id="resume-education-dates" placeholder="e.g. April 2010 - June 2013">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group" id="resume-qualifications-group">
								<label for="resume-qualifications">Qualifications</label>
								<input type="text" class="form-control" id="resume-qualifications" placeholder="e.g. Master Engineer">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group" id="resume-notes-group">
								<label for="resume-notes">Notes (Optional)</label>
								<input type="text" class="form-control" id="resume-notes" placeholder="Any achievements">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<hr class="dashed">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<p><a id="add-education">+ Add Education</a></p>
							<hr>
						</div>
					</div>
					<!-- Education Start -->

					<!-- Resume File Start -->
					<div class="row">
						<div class="col-sm-12">
							<p>&nbsp;</p>
							<h2>Resume File</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group" id="resume-file-group">
								<label for="resume-file">Upload Your Resume (Optional)</label>
								<input type="file" id="resume-file">
								<p class="help-block">Optionally upload your resume for employers to view. Max. file size: 64 MB.</p>
							</div>
						</div>
					</div>
					<!-- Resume File Start -->

					<div class="row text-center">
						<div class="col-sm-12">
							<p>&nbsp;</p>
							<a href="#" class="btn btn-primary btn-lg">Preview <i class="fa fa-arrow-right"></i></a>
						</div>
					</div>

				</form>

			</div>
		</section>

		<!-- ============ RESUME END ============ -->

			@endsection

		@section('pagescript')
		<!-- seperate js file include here..... -->

	
		@endsection