@extends('layouts.master')
@section('title', 'Recruiter Job Post')
@section('content')

		<!-- ============ JOBS START ============ -->

		<section id="jobs">
			<div class="container">

				<?php

				  if (Auth::check() && Auth::user()->usertype == 'jobrecruiter') { ?>
					
				<div class="row text-center" style="margin-bottom:100px">
					<div class="col-sm-12">
						<h1>Post a Job</h1>
						<h4>Find a Right Candidate</h4>
					</div>
				</div>

				<form method="post" action="{{url('saverecruiterjobpost')}}" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<input type="hidden" name="recruiterjobpost" value="2">
					<input type="hidden" name="id" value="{{Auth::user()->id}}">
					<div class="row">
						@if(old('recruiterjobpost'))
			                  @if( Session::has('message') )
			                    <div class="alert alert-success" style="padding: 11px;">
			                       <p style="color: green;">{{ Session::get('message') }}</p>
			                     </div>
			                  @endif
			                  @if( Session::has('error') )
			                    <div class="alert alert-danger" style="padding: 11px;">
			                       <p style="color: red;">{{ Session::get('error') }}</p>
			                     </div>
			                  @endif
							@endif
						<div class="col-sm-6">
							<h2>Job Details</h2>
							<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}" id="job-email-group">
								<label for="job-email">Email</label>
								<input type="email" class="form-control" name="email" placeholder="you@yourdomain.com" maxlength="50" value="{{ old('email') }}">
								 @if ($errors->has('email'))
					                  <span class="help-block">
					                   <strong>{{ $errors->first('email') }}</strong>
					                  </span>
				                 @endif
							</div>
							<div class="form-group {{ $errors->has('jobtitle') ? ' has-error' : '' }}" id="job-title-group">
								<label for="job-title">Title</label>
								<input type="text" class="form-control" name="jobtitle" placeholder="e.g. Web Designer" maxlength="25" value="{{ old('jobtitle') }}">
								 @if ($errors->has('jobtitle'))
					                  <span class="help-block">
					                   <strong>{{ $errors->first('jobtitle') }}</strong>
					                  </span>
				                 @endif
							</div>
							<div class="form-group {{ $errors->has('location') ? ' has-error' : '' }}" id="job-location-group">
								<label for="job-location">Location</label>
								<input type="text" class="form-control" name="location" placeholder="e.g. New York" maxlength="20" value="{{ old('location') }}">
								 @if ($errors->has('location'))
					                  <span class="help-block">
					                   <strong>{{ $errors->first('location') }}</strong>
					                  </span>
				                 @endif
							</div>
							<div class="form-group {{ $errors->has('jobregion') ? ' has-error' : '' }}" id="job-region-group">
								<label for="job-region">Region</label>
								<select  class="form-control" name="jobregion">
									<option>Choose a region</option>
									<option>India</option>
									<option>New York</option>
									<option>Los Angeles</option>
									<option>Chicago</option>
									<option>Boston</option>
									<option>San Francisco</option>
								</select>
								 @if ($errors->has('jobregion'))
					                  <span class="help-block">
					                   <strong>{{ $errors->first('jobregion') }}</strong>
					                  </span>
				                 @endif
							</div>
							<div class="form-group {{ $errors->has('jobtype') ? ' has-error' : '' }}" id="job-type-group">
								<label for="job-type">Job Type</label>
								<select  class="form-control" name="jobtype">
									<option>Choose a job type</option>
									<option>Freelance</option>
									<option>Part Time</option>
									<option>Full Time</option>
									<option>Internship</option>
									<option>Volunteer</option>
								</select>
								 @if ($errors->has('jobtype'))
					                  <span class="help-block">
					                   <strong>{{ $errors->first('jobtype') }}</strong>
					                  </span>
				                 @endif
							</div>
							<div class="form-group {{ $errors->has('jobcategory') ? ' has-error' : '' }}" id="job-category-group">
								<label for="job-category">Job Category</label>
								<select  class="form-control" name="jobcategory">
									<option>Choose a job category</option>
									<option>Internet Services</option>
									<option>Banking</option>
									<option>Financial</option>
									<option>Marketing</option>
									<option>Management</option>
								</select>
								 @if ($errors->has('jobcategory'))
					                  <span class="help-block">
					                   <strong>{{ $errors->first('jobcategory') }}</strong>
					                  </span>
				                 @endif
							</div>
							<div class="form-group {{ $errors->has('jobdescription') ? ' has-error' : '' }}" id="job-description-group">
								<label for="job-description">Description</label>
								<textarea class="textarea form-control" id="job-description" name="jobdescription">{{old('jobdescription')}}</textarea>
								 @if ($errors->has('jobdescription'))
					                  <span class="help-block">
					                   <strong>{{ $errors->first('jobdescription') }}</strong>
					                  </span>
				                 @endif
							</div>
							<div class="form-group {{ $errors->has('joburl') ? ' has-error' : '' }}" id="job-url-group">
								<label for="job-url">Application Email/URL</label>
								<input type="text" class="form-control" name="joburl" placeholder="Email or Website URL" maxlength="100" value="{{ old('joburl') }}">
								 @if ($errors->has('joburl'))
					                  <span class="help-block">
					                   <strong>{{ $errors->first('joburl') }}</strong>
					                  </span>
				                 @endif
							</div>
							<div class="form-group" id="job-url-group">
								<label for="job-url">if you want to featured this Job</label>
								<div class="checkbox">
								  <label><input type="checkbox" name="featuredjob" value="1">Featured Jobs</label>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<h2>Company Details</h2>
							<div class="form-group {{ $errors->has('companyname') ? ' has-error' : '' }}" id="company-name-group">
								<label for="company-name">Company Name</label>
								<input type="text" class="form-control" name="companyname" placeholder="Enter company name" maxlength="50" value="{{ old('companyname') }}">
								 @if ($errors->has('companyname'))
					                  <span class="help-block">
					                   <strong>{{ $errors->first('companyname') }}</strong>
					                  </span>
				                 @endif
							</div>
							<div class="form-group" id="company-tagline-group">
								<label for="company-tagline">Tagline (Optional)</label>
								<input type="text" class="form-control" name="companytagline" placeholder="Brief description" maxlength="25"  value="{{ old('companytagline') }}">
							</div>
							<div class="form-group" id="company-description-group">
								<label for="company-description">Description (Optional)</label>
								<textarea class="textarea form-control" id="company-description" name="companydescription">{{old('companydescription')}}</textarea>
							</div>
							<div class="form-group" id="company-video-group">
								<label for="company-video">Video (Optional)</label>
								<input type="text" class="form-control" name="video_url" placeholder="Video URL" maxlength="100"  value="{{ old('video_url') }}">
							</div>
							<div class="form-group" id="company-website-group">
								<label for="company-website">Website (Optional)</label>
								<input type="text" class="form-control" name="website_url" placeholder="http://" maxlength="100"  value="{{ old('website_url') }}">
							</div>
							<div class="form-group" id="company-google-group">
								<label for="company-google">Google+ Username (Optional)</label>
								<input type="text" class="form-control" name="google_username" placeholder="yourcompany" maxlength="100"  value="{{ old('google_username') }}">
							</div>
							<div class="form-group" id="company-facebook-group">
								<label for="company-facebook">Facebook Username (Optional)</label>
								<input type="text" class="form-control" name="facebook_username" placeholder="yourcompany" maxlength="100"  value="{{ old('facebook_username') }}">
							</div>
							<div class="form-group" id="company-linkedin-group">
								<label for="company-linkedin">LinkedIn Username (Optional)</label>
								<input type="text" class="form-control" name="linkedin_username" placeholder="yourcompany" maxlength="100"  value="{{ old('linkedin_username') }}">
							</div>
							<div class="form-group" id="company-twitter-group">
								<label for="company-twitter">Twitter Username (Optional)</label>
								<input type="text" class="form-control" name="twitter_username" placeholder="@yourcompany" maxlength="100"  value="{{ old('twitter_username') }}">
							</div>
							<div class="form-group" id="company-logo-group">
								<label for="company-logo">Logo (Optional)</label>
								<input type="file" name="company_logo"  value="{{ old('company_logo') }}">
							</div>
						</div>
					</div>
					<div class="row text-center">
						<p>&nbsp;</p>
						<button type="submit" name="register" class="btn btn-primary btn-lg">Submit</button>
						
					</div>
				</form>
				<?php }else{ ?>

				<div class="row text-center">
					<div class="col-sm-12">
						<h1>Post a Job</h1>
						<h4>Find a Right Candidate</h4>
						<div class="jumbotron">
							<h3>Have an account?</h3>
							<p>If you don’t have an account you can create one below by entering your email address/username.<br>
							A password will be automatically emailed to you.</p>
							<p><a href="{{url('recruiter_login')}}" class="btn btn-primary">Sign In</a></p>
						</div>
					</div>
				</div>


				<?php } ?>

			</div>
		</section>

		<!-- ============ JOBS END ============ -->
	


@endsection

		

		