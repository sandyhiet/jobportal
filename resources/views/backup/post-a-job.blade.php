@extends('layouts.master')
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
					<li class="active"><a href="#">My Profile</a>
						<ul>
							<li><a href="#">Logout</a></li>
						</ul>
					</li>
					<!-- <li><a href="{{url('jobs')}}">Jobs</a></li> -->
					<li><a href="{{url('post-a-job')}}">Post a job</a></li>
					<li><a href="{{url('candidates')}}">Candidates</a></li>
					<li><a href="{{url('job-details')}}">packages</a></li>
							<li><a href="{{url('blog')}}">Blog</a></li>
					<!-- <li><a href="{{url('post-a-resume')}}">Post a Resume</a></li> -->
					<!-- <li><a href="#">Read More</a>
						<ul>
							
							<li><a href="{{url('about')}}">About Us</a></li>
							
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
<!-- ============ JOBS START ============ -->

		<section id="jobs">
			<div class="container">
				<div class="row text-center">
					<!-- <div class="col-sm-12">
						<h1>Post a Job</h1>
						<h4>Find a Right Candidate</h4>
						<div class="jumbotron">
							<h3>Have an account?</h3>
							<p>If you don’t have an account you can create one below by entering your email address/username.<br>
							A password will be automatically emailed to you.</p>
							<p><a href="#" class="btn btn-primary">Sign In</a></p>
						</div>
					</div> -->
				</div>

				<form>
					<div class="row">
						<div class="col-sm-6">
							<h2>Job Details</h2>
							<div class="form-group" id="job-email-group">
								<label for="job-email">Email</label>
								<input type="email" class="form-control" id="job-email" placeholder="you@yourdomain.com">
							</div>
							<div class="form-group" id="job-title-group">
								<label for="job-title">Title</label>
								<input type="text" class="form-control" id="job-title" placeholder="e.g. Web Designer">
							</div>
							<div class="form-group" id="job-location-group">
								<label for="job-location">Location (Optional)</label>
								<input type="text" class="form-control" id="job-location" placeholder="e.g. New York">
							</div>
							<div class="form-group" id="job-region-group">
								<label for="job-region">Region</label>
								<select  class="form-control" id="job-region">
									<option>Choose a region</option>
									<option>New York</option>
									<option>Los Angeles</option>
									<option>Chicago</option>
									<option>Boston</option>
									<option>San Francisco</option>
								</select>
							</div>
							<div class="form-group" id="job-type-group">
								<label for="job-type">Job Type</label>
								<select  class="form-control" id="job-type">
									<option>Choose a job type</option>
									<option>Freelance</option>
									<option>Part Time</option>
									<option>Full Time</option>
									<option>Internship</option>
									<option>Volunteer</option>
								</select>
							</div>
							<div class="form-group" id="job-category-group">
								<label for="job-category">Job Category</label>
								<select  class="form-control" id="job-category">
									<option>Choose a job category</option>
									<option>Internet Services</option>
									<option>Banking</option>
									<option>Financial</option>
									<option>Marketing</option>
									<option>Management</option>
								</select>
							</div>
							<div class="form-group" id="job-description-group">
								<label for="job-description">Description</label>
								<div class="textarea form-control" id="job-description"></div>
							</div>
							<div class="form-group" id="job-url-group">
								<label for="job-url">Application Email/URL</label>
								<input type="text" class="form-control" id="job-url" placeholder="Email or Website URL">
							</div>
						</div>
						
						<div class="col-sm-6">
							<h2>Company Details</h2>
							<div class="form-group" id="company-name-group">
								<label for="company-name">Company Name</label>
								<input type="text" class="form-control" id="company-name" placeholder="Enter company name">
							</div>
							<div class="form-group" id="company-tagline-group">
								<label for="company-tagline">Tagline (Optional)</label>
								<input type="text" class="form-control" id="company-tagline" placeholder="Brief description">
							</div>
							<div class="form-group" id="company-description-group">
								<label for="company-description">Description (Optional)</label>
								<div class="textarea form-control" id="company-description"></div>
							</div>
							<div class="form-group" id="company-video-group">
								<label for="company-video">Video (Optional)</label>
								<input type="text" class="form-control" id="company-video" placeholder="Video URL">
							</div>
							<div class="form-group" id="company-website-group">
								<label for="company-website">Website (Optional)</label>
								<input type="text" class="form-control" id="company-website" placeholder="http://">
							</div>
							<div class="form-group" id="company-google-group">
								<label for="company-google">Google+ Username (Optional)</label>
								<input type="text" class="form-control" id="company-google" placeholder="yourcompany">
							</div>
							<div class="form-group" id="company-facebook-group">
								<label for="company-facebook">Facebook Username (Optional)</label>
								<input type="text" class="form-control" id="company-facebook" placeholder="yourcompany">
							</div>
							<div class="form-group" id="company-linkedin-group">
								<label for="company-linkedin">LinkedIn Username (Optional)</label>
								<input type="text" class="form-control" id="company-linkedin" placeholder="yourcompany">
							</div>
							<div class="form-group" id="company-twitter-group">
								<label for="company-twitter">Twitter Username (Optional)</label>
								<input type="text" class="form-control" id="company-twitter" placeholder="@yourcompany">
							</div>
							<div class="form-group" id="company-logo-group">
								<label for="company-logo">Logo (Optional)</label>
								<input type="file" id="company-logo">
							</div>
						</div>
					</div>
					<div class="row text-center">
						<p>&nbsp;</p>
						<a href="#" class="btn btn-primary btn-lg">Preview <i class="fa fa-arrow-right"></i></a>
					</div>
				</form>

			</div>
		</section>

		<!-- ============ JOBS END ============ -->

		

		@endsection

		@section('pagescript')
		<!-- seperate js file include here..... -->

	
		@endsection