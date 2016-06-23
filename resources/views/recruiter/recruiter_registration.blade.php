@extends('layouts.master')
@section('title', 'Recruiter Registration')
@section('content')

		<!-- ============ JOBS START ============ -->

		<section id="jobs">
			<div class="container">

				<form method="post" action="{{url('saverecruiterRegistration')}}">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<input type="hidden" name="recruiterfrm" value="2">
					<div class="row">
						<div class="col-lg-6 col-sm-6 col-lg-offset-3">
							<h2>Recruiter Registration</h2>
								@if(old('recruiterfrm'))
				                  @if( Session::has('message') )
				                    <div class="alert alert-success" style="padding: 11px;">
				                       <p style="color: green;">{{ Session::get('message') }}</p>
				                     </div>
				                  @endif
								@endif
							<div class="form-group {{ $errors->has('companyname') ? ' has-error' : '' }}">
								<label for="job-email">Name / Company Name</label>
								<input type="text" class="form-control" id="companyname" name="companyname" value="{{old('companyname')}}" placeholder="Enter name/comapny name" maxlength="50">
								  @if ($errors->has('companyname'))
					                  <span class="help-block">
					                   <strong>{{ $errors->first('companyname') }}</strong>
					                  </span>
				                  @endif
							</div>
							<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}" id="job-email-group">
								<label for="job-email">Email</label>
								<input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="you@yourdomain.com" maxlength="50">
								  @if ($errors->has('email'))
					                  <span class="help-block">
					                   <strong>{{ $errors->first('email') }}</strong>
					                  </span>
				                  @endif
							</div>
							<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}" id="job-title-group">
								<label for="job-title">Password</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="Enter password" maxlength="15">
								 @if ($errors->has('password'))
					                  <span class="help-block">
					                   <strong>{{ $errors->first('password') }}</strong>
					                  </span>
				                 @endif
							</div>
							<div class="form-group" id="job-location-group">
								<label for="job-location">Re-enter Password</label>
								<input type="password" class="form-control" id="repassword" name="repassword" placeholder="Enter re-password" maxlength="15">
							</div>
							<div class="form-group {{ $errors->has('mobile') ? ' has-error' : '' }}" id="job-title-group">
								<label for="job-title">Mobile No.</label>
								<input type="text" class="form-control" id="mobile" name="mobile" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{old('mobile')}}" placeholder="Enter mobile number" maxlength="11">
								  @if ($errors->has('mobile'))
					                  <span class="help-block">
					                   <strong>{{ $errors->first('mobile') }}</strong>
					                  </span>
				                  @endif
							</div>

							<div class="text-center" style="margin-top: 40px;">
								<button type="submit" name="register" class="form-control btn btn-primary btn-lg">Start Hiring Now</button>
							</div>
							
						</div>
						
					</div>
					
				</form>

			</div>
		</section>

		<!-- ============ JOBS END ============ -->
	


@endsection

		

		